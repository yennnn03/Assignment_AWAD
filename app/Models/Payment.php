<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'milestone_id',
        'freelancer_id',
        'transaction_id',
        'amount',
    ];

    protected $guarded = [
        'created_at',
    ];
}
