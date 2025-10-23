<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowController extends Controller
{
    /**
     * Display all borrowed books.
     */
// public function show($id)
//     {
//         // Fetch the borrow record with related book & user
//         $borrow = Borrow::with(['book', 'user'])->find($id);

//         // If not found, throw 404
//         if (!$borrow) {
//             abort(404, 'Borrow record not found');
//         }

//         // Get the associated book
//         $book = $borrow->book;

//         // Get all borrow history for this book (who borrowed it before)
//         $borrowHistory = Borrow::with('user')
//             ->where('book_id', $book->id)
//             ->orderBy('borrow_date', 'desc')
//             ->get();
// dd($borrowHistory);
//         // Pass data to view
//         return view('books', compact('book', 'borrowHistory'));
//     }




    /**
     * Borrow a book.
     */
   public function store(Request $request)
{
    $request->validate([
        'book_id' => 'required|exists:books,id',
        'user_id' => 'required|exists:users,id',
        'borrow_date' => 'required|date',
        'return_date' => 'required|date|after:borrow_date',
    ]);

    $book = Book::find($request->book_id);

    if (!$book) {
        return redirect()->back()->with('error', 'Book not found');
    }

    // Check if already borrowed
    $isBorrowed = Borrow::where('book_id', $book->id)
        ->whereNull('actual_return_date')
        ->exists();

    if ($isBorrowed) {
        return redirect()->back()->with('error', 'Book is already borrowed');
    }

    Borrow::create([
        'book_id' => $book->id,
        'user_id' => $request->user_id,
        'borrow_date' => $request->borrow_date,
        'return_date' => $request->return_date,
        'status' => 'borrowed',
    ]);

    return response()->json([
            'message' => 'Book returned successfully',

        ]);
}

}
