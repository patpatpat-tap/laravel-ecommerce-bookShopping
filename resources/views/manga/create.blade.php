@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">➕ Add New Manga</h1>

    <form action="{{ route('manga.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow-md space-y-4">
        @csrf

        <div>
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Author</label>
            <input type="text" name="author" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Category</label>
            <input type="text" name="category" class="w-full border rounded px-3 py-2" placeholder="e.g. Action, Fantasy" required>
        </div>

        <div>
            <label class="block text-gray-700">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2" rows="4" required></textarea>
        </div>

        <div>
            <label class="block text-gray-700">Price (₱)</label>
            <input type="number" step="0.01" name="price" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Image URL</label>
            <input type="text" name="image" class="w-full border rounded px-3 py-2" placeholder="https://example.com/cover.jpg" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Add Manga</button>
    </form>
</div>
@endsection
