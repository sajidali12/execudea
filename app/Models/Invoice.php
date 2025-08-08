<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'client_id',
        'project_id',
        'amount',
        'tax_amount',
        'total_amount',
        'status',
        'issue_date',
        'due_date',
        'paid_date',
        'description',
        'payment_terms',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'issue_date' => 'date',
        'due_date' => 'date',
        'paid_date' => 'date',
    ];

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Scopes
    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeOverdue($query)
    {
        return $query->where('status', 'overdue');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    // Accessors
    public function getStatusColorAttribute()
    {
        return [
            'draft' => 'gray',
            'pending' => 'yellow',
            'paid' => 'green',
            'overdue' => 'red',
            'cancelled' => 'gray',
        ][$this->status] ?? 'gray';
    }

    public function getIsOverdueAttribute()
    {
        return $this->status !== 'paid' && $this->due_date && $this->due_date->isPast();
    }

    // Boot method for auto-generating invoice numbers
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            if (empty($invoice->invoice_number)) {
                $invoice->invoice_number = 'INV-' . date('Y') . '-' . str_pad((Invoice::count() + 1), 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
