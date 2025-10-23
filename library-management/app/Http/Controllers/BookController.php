<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Helper: always fetch distinct categories (used by multiple views)
    protected function allCategories()
    {
        return Book::select('category')->distinct()->pluck('category');
    }

    // Show home with categories
    public function showCategories()
    {
        $categories = $this->allCategories();
        return view('home', compact('categories'));
    }

    // Show single book detail
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $categories = $this->allCategories();
        return view('book_detail', compact('book', 'categories'));
    }

    // Search handler — returns a search results page
    public function search(Request $request)
    {
        $query = trim($request->input('query', ''));

        $categories = $this->allCategories();

        // If query empty, you may return all books or redirect back.
        // Here we return an empty collection and show a friendly message on results page.
        if ($query === '') {
            $books = collect();
            return view('search_results', compact('books', 'query', 'categories'));
        }

        $books = Book::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('author', 'LIKE', "%{$query}%")
                    ->orWhere('category', 'LIKE', "%{$query}%")
                    ->orWhere('isbn', 'LIKE', "%{$query}%")
                    ->get();

        return view('search_results', compact('books', 'query', 'categories'));
    }

    // Get all books by exact author
    public function getByAuthor($author)
    {
        $books = Book::where('author', $author)->get();
        $categories = $this->allCategories();

        if ($books->isEmpty()) {
            return view('book', ['error' => 'No books found for this author.', 'categories' => $categories]);
        }

        return view('book', compact('books', 'categories'));
    }

    // Get all books by category (used by category link)
    public function getByCategory($category)
    {
        $books = Book::where('category', $category)->get();
        $categories = $this->allCategories();

        if ($books->isEmpty()) {
            return view('book_categories', [
                'error' => "No books found in {$category} category.",
                'category' => $category,
                'categories' => $categories
            ]);
        }

        return view('book_categories', compact('books', 'category', 'categories'));
    }
    public function ajaxSearch(Request $request)
{
    $query = $request->get('query', '');

    if (!$query) {
        return response()->json([]);
    }

    $books = Book::where('title', 'LIKE', "%{$query}%")
                ->orWhere('author', 'LIKE', "%{$query}%")
                ->orWhere('isbn', 'LIKE', "%{$query}%")
                ->limit(10)
                ->get(['id', 'title', 'author']); // only needed fields

    return response()->json($books);
}

}
