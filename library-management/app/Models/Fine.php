<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrow_id',
        'user_id',
        'amount',
        'reason',
        'paid',
        'paid_at',
    ];

    protected $casts = [
        'paid' => 'boolean',
        'paid_at' => 'datetime',
    ];

    public function borrow()
    {
        return $this->belongsTo(\App\Models\Borrow::class, 'borrow_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
