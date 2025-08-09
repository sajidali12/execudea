<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TaskAssignment;
use App\Models\ProjectTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyTaskController extends Controller
{
    /**
     * Display today's tasks for the authenticated user.
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        $status = $request->get('status', 'all');
        $project = $request->get('project');

        $query = TaskAssignment::with(['task.project', 'task.creator'])
                              ->forUser($userId);

        // Filter by status
        if ($status !== 'all') {
            $query->byStatus($status);
        }

        // Filter by project
        if ($project) {
            $query->whereHas('task.project', function($q) use ($project) {
                $q->where('id', $project);
            });
        }

        // Get today's and overdue tasks
        $todayTasks = (clone $query)->todayForUser($userId)->get();
        
        // Get all user assignments for statistics
        $allTasks = $query->get();

        // Get user's projects (projects with assigned tasks)
        $projects = \App\Models\Project::whereHas('tasks.assignments', function($q) use ($userId) {
            $q->where('user_id', $userId);
        })->get();

        // Task statistics
        $stats = [
            'total' => $allTasks->count(),
            'assigned' => $allTasks->where('status', 'assigned')->count(),
            'in_progress' => $allTasks->where('status', 'in_progress')->count(),
            'completed' => $allTasks->where('status', 'completed')->count(),
            'overdue' => $allTasks->filter(function($assignment) {
                return $assignment->task->isOverdue();
            })->count(),
        ];

        return view('user.daily-tasks.index', compact(
            'todayTasks', 
            'allTasks', 
            'projects', 
            'stats', 
            'status', 
            'project'
        ));
    }

    /**
     * Start working on a task.
     */
    public function start(TaskAssignment $assignment)
    {
        // Verify the assignment belongs to the authenticated user
        if ($assignment->user_id !== Auth::id()) {
            abort(403);
        }

        if ($assignment->status !== 'assigned') {
            return back()->with('error', 'Task cannot be started.');
        }

        $assignment->markAsStarted();

        return back()->with('success', 'Task started successfully.');
    }

    /**
     * Mark a task as completed.
     */
    public function complete(Request $request, TaskAssignment $assignment)
    {
        // Verify the assignment belongs to the authenticated user
        if ($assignment->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'actual_hours' => 'nullable|integer|min:0|max:24',
            'notes' => 'nullable|string|max:1000',
        ]);

        if (!in_array($assignment->status, ['assigned', 'in_progress'])) {
            return back()->with('error', 'Task cannot be marked as completed.');
        }

        $assignment->markAsCompleted(
            $validated['actual_hours'] ?? null,
            $validated['notes'] ?? null
        );

        return back()->with('success', 'Task marked as completed successfully.');
    }

    /**
     * Add notes to a task assignment.
     */
    public function addNotes(Request $request, TaskAssignment $assignment)
    {
        // Verify the assignment belongs to the authenticated user
        if ($assignment->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'notes' => 'required|string|max:1000',
        ]);

        $assignment->update([
            'notes' => $validated['notes']
        ]);

        return back()->with('success', 'Notes updated successfully.');
    }

    /**
     * Get task details for modal/AJAX.
     */
    public function show(TaskAssignment $assignment)
    {
        // Verify the assignment belongs to the authenticated user
        if ($assignment->user_id !== Auth::id()) {
            abort(403);
        }

        $assignment->load(['task.project', 'task.creator']);

        return response()->json([
            'id' => $assignment->id,
            'title' => $assignment->task->title,
            'description' => $assignment->task->description,
            'priority' => $assignment->task->priority,
            'status' => $assignment->status,
            'project' => $assignment->task->project->name,
            'due_date' => $assignment->task->due_date?->format('M d, Y'),
            'estimated_hours' => $assignment->task->estimated_hours,
            'actual_hours' => $assignment->actual_hours,
            'notes' => $assignment->notes,
            'started_at' => $assignment->started_at?->format('M d, Y H:i'),
            'completed_at' => $assignment->completed_at?->format('M d, Y H:i'),
        ]);
    }

    /**
     * Get user's task calendar data.
     */
    public function calendar()
    {
        $userId = Auth::id();
        
        $assignments = TaskAssignment::with(['task.project'])
                                   ->forUser($userId)
                                   ->whereIn('status', ['assigned', 'in_progress'])
                                   ->whereHas('task', function($q) {
                                       $q->whereNotNull('due_date');
                                   })
                                   ->get();

        $events = $assignments->map(function($assignment) {
            return [
                'id' => $assignment->id,
                'title' => $assignment->task->title,
                'start' => $assignment->task->due_date->format('Y-m-d'),
                'color' => $this->getEventColor($assignment->task->priority),
                'extendedProps' => [
                    'project' => $assignment->task->project->name,
                    'priority' => $assignment->task->priority,
                    'status' => $assignment->status,
                    'description' => $assignment->task->description,
                ]
            ];
        });

        return response()->json($events);
    }

    /**
     * Get color for calendar events based on priority.
     */
    private function getEventColor($priority)
    {
        return match($priority) {
            'urgent' => '#dc2626',
            'high' => '#ea580c',
            'medium' => '#ca8a04',
            'low' => '#16a34a',
            default => '#6b7280'
        };
    }

    /**
     * Bulk update task assignments (for checklist functionality).
     */
    public function bulkUpdate(Request $request)
    {
        $validated = $request->validate([
            'assignments' => 'required|array',
            'assignments.*.id' => 'required|exists:task_assignments,id',
            'assignments.*.status' => 'required|in:assigned,in_progress,completed',
            'assignments.*.actual_hours' => 'nullable|integer|min:0',
            'assignments.*.notes' => 'nullable|string',
        ]);

        $userId = Auth::id();
        $updated = 0;

        foreach ($validated['assignments'] as $assignmentData) {
            $assignment = TaskAssignment::where('id', $assignmentData['id'])
                                       ->where('user_id', $userId)
                                       ->first();

            if (!$assignment) {
                continue;
            }

            if ($assignmentData['status'] === 'completed') {
                $assignment->markAsCompleted(
                    $assignmentData['actual_hours'] ?? null,
                    $assignmentData['notes'] ?? null
                );
            } elseif ($assignmentData['status'] === 'in_progress' && $assignment->status === 'assigned') {
                $assignment->markAsStarted();
            }

            $updated++;
        }

        return response()->json([
            'success' => true,
            'message' => "{$updated} tasks updated successfully."
        ]);
    }
}