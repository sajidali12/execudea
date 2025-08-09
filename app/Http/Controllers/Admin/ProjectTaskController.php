<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\TaskAssignment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectTaskController extends Controller
{
    /**
     * Display a listing of tasks for a project.
     */
    public function index(Project $project)
    {
        $tasks = $project->tasks()
                         ->with(['creator', 'assignments.user'])
                         ->orderedByPriority()
                         ->paginate(15);

        return view('admin.projects.tasks.index', compact('project', 'tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create(Project $project)
    {
        return view('admin.projects.tasks.create', compact('project'));
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high,urgent',
            'due_date' => 'nullable|date|after:today',
            'estimated_hours' => 'nullable|integer|min:1',
        ]);

        $task = $project->tasks()->create([
            ...$validated,
            'created_by' => Auth::id(),
            'order' => $project->tasks()->max('order') + 1,
        ]);

        return redirect()
            ->route('admin.projects.tasks.show', [$project, $task])
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified task.
     */
    public function show(Project $project, ProjectTask $task)
    {
        $task->load(['creator', 'assignments.user', 'assignments.assignedBy']);
        $users = User::where('role', '!=', 'client')
                    ->where('is_active', true)
                    ->orderBy('name')
                    ->get();

        return view('admin.projects.tasks.show', compact('project', 'task', 'users'));
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Project $project, ProjectTask $task)
    {
        return view('admin.projects.tasks.edit', compact('project', 'task'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Project $project, ProjectTask $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high,urgent',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'due_date' => 'nullable|date',
            'estimated_hours' => 'nullable|integer|min:1',
        ]);

        $task->update($validated);

        return redirect()
            ->route('admin.projects.tasks.show', [$project, $task])
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Project $project, ProjectTask $task)
    {
        $task->delete();

        return redirect()
            ->route('admin.projects.tasks.index', $project)
            ->with('success', 'Task deleted successfully.');
    }

    /**
     * Assign task to a user.
     */
    public function assign(Request $request, Project $project, ProjectTask $task)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'notes' => 'nullable|string|max:1000',
            ]);

            // Check if task is already assigned to this user
            if ($task->assignments()->where('user_id', $validated['user_id'])->exists()) {
                return back()->with('error', 'Task is already assigned to this user.');
            }

            // Verify the user exists and is active
            $user = User::where('id', $validated['user_id'])
                       ->where('is_active', true)
                       ->first();

            if (!$user) {
                return back()->with('error', 'Selected user is not available for assignment.');
            }

            $assignment = $task->assignments()->create([
                'user_id' => $validated['user_id'],
                'assigned_by' => Auth::id(),
                'notes' => $validated['notes'],
            ]);

            if ($assignment) {
                return back()->with('success', "Task successfully assigned to {$user->name}.");
            } else {
                return back()->with('error', 'Failed to assign task. Please try again.');
            }

        } catch (\Exception $e) {
            \Log::error('Task assignment failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while assigning the task. Please try again.');
        }
    }

    /**
     * Update task assignment status.
     */
    public function updateAssignment(Request $request, Project $project, ProjectTask $task, TaskAssignment $assignment)
    {
        $validated = $request->validate([
            'status' => 'required|in:assigned,in_progress,completed,cancelled',
            'notes' => 'nullable|string',
            'actual_hours' => 'nullable|integer|min:0',
        ]);

        if ($validated['status'] === 'completed') {
            $assignment->markAsCompleted($validated['actual_hours'], $validated['notes']);
        } else {
            $assignment->update($validated);
            
            if ($validated['status'] === 'in_progress' && !$assignment->started_at) {
                $assignment->markAsStarted();
            }
        }

        return back()->with('success', 'Assignment updated successfully.');
    }

    /**
     * Remove task assignment.
     */
    public function unassign(Project $project, ProjectTask $task, TaskAssignment $assignment)
    {
        $assignment->delete();

        return back()->with('success', 'Task unassigned successfully.');
    }

    /**
     * Bulk update task order.
     */
    public function reorder(Request $request, Project $project)
    {
        $validated = $request->validate([
            'tasks' => 'required|array',
            'tasks.*.id' => 'required|exists:project_tasks,id',
            'tasks.*.order' => 'required|integer',
        ]);

        foreach ($validated['tasks'] as $taskData) {
            ProjectTask::where('id', $taskData['id'])
                      ->where('project_id', $project->id)
                      ->update(['order' => $taskData['order']]);
        }

        return response()->json(['success' => true]);
    }
}