<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MangaController extends Controller
{
    private $filePath = 'categories.json';

    private function getCategories()
    {
        if (!Storage::exists($this->filePath)) {
            Storage::put($this->filePath, json_encode([]));
        }
        return json_decode(Storage::get($this->filePath), true);
    }

    public function dashboard()
    {
        $categories = $this->getCategories();
        $mangas = Manga::with('category')->get();

        return view('dashboard', compact('categories', 'mangas'));
    }

    public function index(Request $request)
    {
        $query = Manga::with('category');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('author', 'like', '%' . $search . '%');
        }

        $mangas = $query->get();

        return view('manga.index', compact('mangas'));
    }

    public function show($id)
    {
        $manga = Manga::with('category')->findOrFail($id);

        return view('manga.show', compact('manga'));
    }
}
