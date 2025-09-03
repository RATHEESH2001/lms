<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // 🔍 Search Books
    public function search(Request $request)
    {
        $query = $request->input('query'); // search term

        $books = Book::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('author', 'LIKE', "%{$query}%")
                    ->orWhere('category', 'LIKE', "%{$query}%")
                    ->get();

        // return view instead of JSON
        return view('book', compact('books'));
    }

    // 📚 Get books by author
    public function getByAuthor($author)
    {
        $books = Book::where('author', $author)->get();

        if ($books->isEmpty()) {
            return view('book')->with('error', 'No books found for this author.');
        }

        return view('book', compact('books'));
    }

    // 📖 Get books by category
    public function getByCategory($category)
    {
        $books = Book::where('category', $category)->get();

        if ($books->isEmpty()) {
            return view('books')->with('error', 'No books found in this category.');
        }

        return view('book', compact('books'));
    }
}
