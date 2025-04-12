<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'amount',
        'due_date',
    ];
    
    protected $guarded = [
        'status',
        'created_at',
        'in_progress_at',
        'completed_at',
        'approved_at',
        'paid_at',
        'received_at',
    ];
    
    protected $attributes = [
        'status' => 'pending',
    ];
}
