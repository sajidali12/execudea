<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'name',
        'description',
        'type',
        'status',
        'budget',
        'start_date',
        'due_date',
        'completion_date',
        'progress',
        'notes',
    ];

    protected $casts = [
        'budget' => 'decimal:2',
        'start_date' => 'date',
        'due_date' => 'date',
        'completion_date' => 'date',
        'progress' => 'integer',
    ];

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeOnHold($query)
    {
        return $query->where('status', 'on_hold');
    }

    // Accessors
    public function getStatusColorAttribute()
    {
        return [
            'pending' => 'yellow',
            'active' => 'blue',
            'completed' => 'green',
            'on_hold' => 'red',
            'cancelled' => 'gray',
        ][$this->status] ?? 'gray';
    }

    public function getProgressColorAttribute()
    {
        if ($this->progress >= 80) return 'green';
        if ($this->progress >= 50) return 'blue';
        if ($this->progress >= 25) return 'yellow';
        return 'red';
    }
}
