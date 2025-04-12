<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = [
        'project_id',
        'freelancer_id',
        'bid_amount',
        'msg',
    ];

    protected $guarded = [
        'status',
    ]; 

    protected $attributes = [
        'status' => 'pending',
    ];
}
