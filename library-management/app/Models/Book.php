<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'author',
        'category',
        'isbn',
        'publisher',
        'published_year',
        'pages',
        'language',
        'available_copies',
'description',
'total_copies'
    ];
}
