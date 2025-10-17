<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show all books
    public function index()
    {
        $categories = Category::all();
        $books = Book::with('category')->get();
        return view('home', compact('books', 'categories'));
    }

    // Show a single book
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('book_detail', compact('book'));
    }
}
