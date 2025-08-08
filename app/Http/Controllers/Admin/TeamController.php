<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $query = Team::with('user')->latest();

        // Search functionality
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('designation', 'like', '%' . $request->search . '%')
                  ->orWhere('department', 'like', '%' . $request->search . '%');
            });
        }

        // Status filter
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Department filter
        if ($request->department) {
            $query->where('department', $request->department);
        }

        $teams = $query->paginate(15);

        // Get filter options
        $departments = Team::distinct('department')->whereNotNull('department')->pluck('department');
        
        // Statistics
        $totalMembers = Team::count();
        $activeMembers = Team::where('status', 'active')->count();
        $totalSalaryExpense = Team::where('status', 'active')->sum('salary');

        return view('admin.teams.index', compact(
            'teams',
            'departments',
            'totalMembers',
            'activeMembers', 
            'totalSalaryExpense'
        ));
    }

    public function create()
    {
        $users = User::whereDoesntHave('team')->get(); // Users not already assigned to team
        $departments = ['Development', 'Design', 'Marketing', 'Sales', 'HR', 'Management', 'Operations'];
        
        return view('admin.teams.create', compact('users', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'required|email|unique:teams,email',
            'phone' => 'nullable|string|max:20',
            'salary' => 'required|numeric|min:0',
            'joining_date' => 'required|date',
            'department' => 'required|string|max:100',
            'status' => 'required|in:active,inactive',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'user_id' => 'nullable|exists:users,id|unique:teams,user_id',
        ]);

        $data = $request->all();

        // Handle skills as array
        if ($request->skills) {
            $data['skills'] = array_map('trim', explode(',', $request->skills));
        }

        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('teams/profiles', 'public');
        }

        Team::create($data);

        return redirect()->route('admin.teams.index')
            ->with('success', 'Team member added successfully!');
    }

    public function show(Team $team)
    {
        $team->load('user');
        return view('admin.teams.show', compact('team'));
    }

    public function edit(Team $team)
    {
        $users = User::whereDoesntHave('team')
            ->orWhere('id', $team->user_id)
            ->get();
        $departments = ['Development', 'Design', 'Marketing', 'Sales', 'HR', 'Management', 'Operations'];
        
        return view('admin.teams.edit', compact('team', 'users', 'departments'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'required|email|unique:teams,email,' . $team->id,
            'phone' => 'nullable|string|max:20',
            'salary' => 'required|numeric|min:0',
            'joining_date' => 'required|date',
            'department' => 'required|string|max:100',
            'status' => 'required|in:active,inactive',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'user_id' => 'nullable|exists:users,id|unique:teams,user_id,' . $team->id,
        ]);

        $data = $request->all();

        // Handle skills as array
        if ($request->skills) {
            $data['skills'] = array_map('trim', explode(',', $request->skills));
        } else {
            $data['skills'] = null;
        }

        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture
            if ($team->profile_picture) {
                Storage::disk('public')->delete($team->profile_picture);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('teams/profiles', 'public');
        }

        $team->update($data);

        return redirect()->route('admin.teams.index')
            ->with('success', 'Team member updated successfully!');
    }

    public function destroy(Team $team)
    {
        // Delete profile picture if exists
        if ($team->profile_picture) {
            Storage::disk('public')->delete($team->profile_picture);
        }

        $team->delete();

        return redirect()->route('admin.teams.index')
            ->with('success', 'Team member deleted successfully!');
    }
}