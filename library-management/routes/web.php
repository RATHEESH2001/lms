<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\BookController;
// use App\Http\Controllers\BorrowController;

/*
| Public pages
*/
// Route::view('/signup', 'signup');
// Route::view('/', 'login')->name('login');
// Route::view('/login', 'login');

// Dashboard / Home (shows categories)
// Route::get('/home', [BookController::class, 'showCategories'])->name('home');

// Book detail
// Route::get('/books/{id}', [BookController::class, 'show'])->name('book_detail');

// Category page (clicking a category)
// Route::get('/home/book_categories/{category}', [BookController::class, 'getByCategory'])->name('home.category');

// Author page
// Route::get('/books/author/{author}', [BookController::class, 'getByAuthor'])->name('books.author');

// Search route (GET)
// Route::get('/home/search', [BookController::class, 'search'])->name('home.search');

/*
| Auth / user routes
*/
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/profile', [UserController::class, 'getUserData'])->name('profile');
// Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change.password');

/*
| Borrowing
*/
// Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');
// Live search (AJAX)
// Route::get('/home/search/ajax', [BookController::class, 'ajaxSearch'])->name('home.search.ajax');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;

/*
|--------------------------------------------------------------------------
| Public pages (only for guests)
|--------------------------------------------------------------------------
| /signup and /login should not be visible to authenticated users.
*/
Route::middleware('guest')->group(function () {
    Route::view('/signup', 'signup')->name('signup');
    Route::view('/', 'login')->name('login');   // keep as root login
    Route::view('/login', 'login');             // optional alias
    // If you want to route registered users to /home automatically,
    // you can handle that in AuthController or via a controller middleware.
});

/*
|--------------------------------------------------------------------------
| Auth actions (login/register) - accessible to guests (or to everyone for POST)
|--------------------------------------------------------------------------
| Note: POST endpoints often must be reachable when the user submits forms,
| so they can remain outside guest middleware if your forms submit from public pages.
*/
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

/*
|--------------------------------------------------------------------------
| Protected routes (only for authenticated users)
|--------------------------------------------------------------------------
| Wrap everything that should be viewable only after logging in with `auth`.
*/
Route::middleware('auth')->group(function () {
    // Dashboard / Home (shows categories)
    Route::get('/home', [BookController::class, 'showCategories'])->name('home');

    // Book detail
    Route::get('/books/{id}', [BookController::class, 'show'])->name('book_detail');

    // Category page (clicking a category)
    Route::get('/home/book_categories/{category}', [BookController::class, 'getByCategory'])->name('home.category');

    // Author page
    Route::get('/books/author/{author}', [BookController::class, 'getByAuthor'])->name('books.author');

    // Search route (GET)
    Route::get('/home/search', [BookController::class, 'search'])->name('home.search');

    // Live search (AJAX)
    Route::get('/home/search/ajax', [BookController::class, 'ajaxSearch'])->name('home.search.ajax');

    /*
    | Authenticated user actions
    */
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // should be POST from a form

    Route::get('/profile', [UserController::class, 'getUserData'])->name('profile');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change.password');

    /*
    | Borrowing
    */
    Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');
});
