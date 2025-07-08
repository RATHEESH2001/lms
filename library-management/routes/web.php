<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('signup');
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [UserController::class, 'getUserData']);
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change.password');
