<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'borrow_date',
        'return_date',
        'actual_return_date',
        'status',
        'fine_amount',
    ];

    // Cast dates to Carbon instances
    protected $casts = [
        'borrow_date' => 'datetime',
        'return_date' => 'datetime',
        'actual_return_date' => 'datetime',
    ];

    public function book()
    {
        return $this->belongsTo(\App\Models\Book::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
