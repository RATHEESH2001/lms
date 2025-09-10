<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('register');
});


Route::get('/signup', function () {
    return view('signup');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/book', function () {
    return view('book');
});
Route::get('/book_detail', function () {
    return view('book_detail');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [UserController::class, 'getUserData']);
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change.password');

Route::get('/books/search', [BookController::class, 'search']);
Route::get('/books/category/{category}', [BookController::class, 'searchByCategory']);
Route::get('/books/author/{author}', [BookController::class, 'getByAuthor']);
Route::get('/book', [BookController::class, 'getByCategory']);
Route::get('/home', [BookController::class, 'showCategories']);
Route::get('/home', [BookController::class, 'showCategories']);
Route::get('/home/book_categories/{category}', [BookController::class, 'getByCategory']);


Route::get('/books/{id}', [BookController::class, 'show'])->name('book_detail');
