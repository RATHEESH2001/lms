<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/books/search', [BookController::class, 'search']);
Route::get('/books/category/{category}', [BookController::class, 'getByCategory']);
Route::get('/books/author/{author}', [BookController::class, 'getByAuthor']);
Route::get('/borrow/{id}', [BorrowController::class, 'show'])->name('borrow.show');
