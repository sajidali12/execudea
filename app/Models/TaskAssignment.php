<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'user_id',
        'assigned_by',
        'status',
        'notes',
        'started_at',
        'completed_at',
        'actual_hours'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'actual_hours' => 'integer'
    ];

    /**
     * Get the task that was assigned
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(ProjectTask::class, 'task_id');
    }

    /**
     * Get the user who was assigned the task
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user who assigned the task
     */
    public function assignedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    /**
     * Scope to get assignments for a specific user
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope to get assignments by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope to get today's assignments for a user
     */
    public function scopeTodayForUser($query, $userId)
    {
        return $query->where('user_id', $userId)
                    ->whereHas('task', function($q) {
                        $q->where('due_date', '<=', today()->addDays(1))
                          ->orWhereNull('due_date');
                    })
                    ->whereIn('status', ['assigned', 'in_progress']);
    }

    /**
     * Mark task as started
     */
    public function markAsStarted()
    {
        $this->update([
            'status' => 'in_progress',
            'started_at' => now()
        ]);
    }

    /**
     * Mark task as completed
     */
    public function markAsCompleted($actualHours = null, $notes = null)
    {
        $this->update([
            'status' => 'completed',
            'completed_at' => now(),
            'actual_hours' => $actualHours,
            'notes' => $notes
        ]);

        // Update the main task status if all assignments are completed
        $this->updateTaskStatus();
    }

    /**
     * Update the main task status based on assignment statuses
     */
    private function updateTaskStatus()
    {
        $task = $this->task;
        $assignments = $task->assignments;
        
        if ($assignments->every(fn($assignment) => $assignment->status === 'completed')) {
            $task->update(['status' => 'completed']);
        } elseif ($assignments->some(fn($assignment) => $assignment->status === 'in_progress')) {
            $task->update(['status' => 'in_progress']);
        }
    }

    /**
     * Get status color for display
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'assigned' => 'text-yellow-600 bg-yellow-100',
            'in_progress' => 'text-blue-600 bg-blue-100',
            'completed' => 'text-green-600 bg-green-100',
            'cancelled' => 'text-red-600 bg-red-100',
            default => 'text-gray-600 bg-gray-100'
        };
    }
}
