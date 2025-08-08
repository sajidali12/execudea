<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation', 
        'email',
        'phone',
        'profile_picture',
        'salary',
        'joining_date',
        'status',
        'bio',
        'skills',
        'department',
        'user_id',
    ];

    protected $casts = [
        'salary' => 'decimal:2',
        'joining_date' => 'date',
        'skills' => 'array',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department);
    }

    // Accessors
    public function getFormattedSalaryAttribute()
    {
        return 'PKR ' . number_format($this->salary, 2);
    }

    public function getProfileImageAttribute()
    {
        if ($this->profile_picture) {
            return asset('storage/' . $this->profile_picture);
        }
        
        // Return default avatar if no image
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=4db8b3&background=e5f9f7&size=200';
    }

    public function getYearsOfServiceAttribute()
    {
        return $this->joining_date->diffInYears(now());
    }
}
