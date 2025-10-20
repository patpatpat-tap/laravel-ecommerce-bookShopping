<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    private $filePath = 'categories.json';

    // 🟢 Get categories from file
    private function getCategories()
    {
        if (!Storage::exists($this->filePath)) {
            Storage::put($this->filePath, json_encode([]));
        }
        return json_decode(Storage::get($this->filePath), true);
    }

    // 🔵 Save categories back to file
    private function saveCategories($categories)
    {
        Storage::put($this->filePath, json_encode($categories, JSON_PRETTY_PRINT));
    }

    // 🟩 Show form to create a category
    public function create()
    {
        return view('categories.create');
    }

    // 🟦 Store new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $categories = $this->getCategories();

        $categories[] = [
            'id' => Str::uuid()->toString(),
            'name' => $request->name,
        ];

        $this->saveCategories($categories);

        return redirect()->route('dashboard')->with('success', 'Category added successfully.');
    }

    // 🟨 Show form to edit a category
    public function edit($id)
    {
        $categories = $this->getCategories();
        $category = collect($categories)->firstWhere('id', $id);

        if (!$category) {
            abort(404, 'Category not found.');
        }

        return view('categories.edit', compact('category'));
    }

    // 🟧 Update existing category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $categories = $this->getCategories();

        foreach ($categories as &$cat) {
            if ($cat['id'] === $id) {
                $cat['name'] = $request->name;
                break;
            }
        }

        $this->saveCategories($categories);

        return redirect()->route('dashboard')->with('success', 'Category updated successfully.');
    }

    // 🟥 Delete a category
    public function destroy($id)
    {
        $categories = $this->getCategories();
        $categories = array_filter($categories, fn($cat) => $cat['id'] !== $id);

        $this->saveCategories($categories);

        return redirect()->route('dashboard')->with('success', 'Category deleted successfully.');
    }
}
