<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show books in a specific category
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $books = $category->books;
        $categories = Category::all();
        return view('home', compact('books', 'categories', 'category'));
    }
}
