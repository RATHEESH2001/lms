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
    public function searchByCategory($category)
    {
        $books = Book::where('category', $category)->get();

        if ($books->isEmpty()) {
            return view('books')->with('error', 'No books found in this category.');
        }

        return view('book', compact('books'));
    }

public function showCategories()
{
    // Get distinct category names
    $categories = Book::select('category')->distinct()->pluck('category');

    return view('home', compact('categories'));
}

public function getByCategory($category)
{
    // Get all books in a specific category
    $books = Book::where('category', $category)->get();

    if ($books->isEmpty()) {
        return view('category', [
            'error' => "No books found in {$category} category.",
            'category' => $category
        ]);
    }

    return view('book_categories', compact('books', 'category'));
}
 public function show($id)
    {
        $book = Book::findOrFail($id);

        // since your blade file is book_detail.blade.php
        return view('book_detail', compact('book'));
    }


}
