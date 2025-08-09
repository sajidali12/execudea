<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('client')->latest();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->client_id) {
            $query->where('client_id', $request->client_id);
        }

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhereHas('client', function($clientQuery) use ($request) {
                      $clientQuery->where('name', 'like', '%' . $request->search . '%');
                  });
            });
        }

        $projects = $query->paginate(15);
        $clients = Client::orderBy('name')->get();

        return view('admin.projects.index', compact('projects', 'clients'));
    }

    public function create()
    {
        $clients = Client::orderBy('name')->get();
        return view('admin.projects.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:100',
            'status' => 'required|in:pending,active,completed,on_hold,cancelled',
            'budget' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:start_date',
            'progress' => 'nullable|integer|min:0|max:100',
            'notes' => 'nullable|string',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'show_on_website' => 'nullable|boolean',
        ]);

        $data = $request->all();
        if ($request->status === 'completed' && !$request->completion_date) {
            $data['completion_date'] = now();
        }

        // Handle file upload
        if ($request->hasFile('project_image')) {
            $data['project_image'] = $request->file('project_image')->store('projects', 'public');
        }

        // Handle checkbox
        $data['show_on_website'] = $request->has('show_on_website') ? 1 : 0;

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }

    public function show(Project $project)
    {
        $project->load('client', 'invoices');
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $clients = Client::orderBy('name')->get();
        return view('admin.projects.edit', compact('project', 'clients'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:100',
            'status' => 'required|in:pending,active,completed,on_hold,cancelled',
            'budget' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:start_date',
            'completion_date' => 'nullable|date',
            'progress' => 'nullable|integer|min:0|max:100',
            'notes' => 'nullable|string',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'show_on_website' => 'nullable|boolean',
        ]);

        $data = $request->all();
        if ($request->status === 'completed' && !$project->completion_date && !$request->completion_date) {
            $data['completion_date'] = now();
        }

        // Handle file upload
        if ($request->hasFile('project_image')) {
            // Delete old image if exists
            if ($project->project_image && \Storage::disk('public')->exists($project->project_image)) {
                \Storage::disk('public')->delete($project->project_image);
            }
            $data['project_image'] = $request->file('project_image')->store('projects', 'public');
        }

        // Handle checkbox
        $data['show_on_website'] = $request->has('show_on_website') ? 1 : 0;

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }
}
