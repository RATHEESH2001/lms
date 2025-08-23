<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query'); // search term

        $books = Book::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('author', 'LIKE', "%{$query}%")
                    ->orWhere('category', 'LIKE', "%{$query}%")
                    ->get();

        return response()->json($books);
    }

public function getByAuthor($author)
{
    // Fetch books that belong to a specific category
    $books = Book::where('author', $author)->get();

    // If no books found
    if ($books->isEmpty()) {
        return response()->json([
            'message' => 'No books found in this author',
            'data' => []
        ], 404);
    }

    return response()->json([
        'message' => 'Books fetched successfully',
        'data' => $books
    ], 200);
}
public function getByCategory($category)
{
    // Fetch books that belong to a specific category
    $books = Book::where('category', $category)->get();

    // If no books found
    if ($books->isEmpty()) {
        return response()->json([
            'message' => 'No books found in this category',
            'data' => []
        ], 404);
    }

    return response()->json([
        'message' => 'Books fetched successfully',
        'data' => $books
    ], 200);
}
}
