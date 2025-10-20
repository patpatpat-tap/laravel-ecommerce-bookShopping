@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">✏️ Edit Manga</h1>

    <form action="{{ route('manga.update', $manga->id) }}" method="POST" class="bg-white p-6 rounded-2xl shadow-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $manga->title }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Author</label>
            <input type="text" name="author" value="{{ $manga->author }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Category</label>
            <input type="text" name="category" value="{{ $manga->category }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2" rows="4" required>{{ $manga->description }}</textarea>
        </div>

        <div>
            <label class="block text-gray-700">Price (₱)</label>
            <input type="number" step="0.01" name="price" value="{{ $manga->price }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Image URL</label>
            <input type="text" name="image" value="{{ $manga->image }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">Update Manga</button>
    </form>
</div>
@endsection
