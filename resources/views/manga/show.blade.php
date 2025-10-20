@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex flex-col md:flex-row gap-6">
        <img src="{{ $manga->image }}" alt="{{ $manga->title }}" class="w-full md:w-1/3 rounded-2xl shadow-md">
        
        <div class="flex-1">
            <h1 class="text-3xl font-bold mb-2">{{ $manga->title }}</h1>
            <p class="text-gray-600 mb-1">Author: <span class="font-semibold">{{ $manga->author }}</span></p>
            <p class="text-gray-500 mb-3">Category: {{ $manga->category }}</p>

            <p class="mb-4 text-gray-700">{{ $manga->description }}</p>

            <p class="text-lg font-semibold text-blue-600 mb-4">₱{{ number_format($manga->price, 2) }}</p>

            <div class="flex gap-3">
                <a href="{{ route('manga.edit', $manga->id) }}" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500 transition">Edit</a>
                <form action="{{ route('manga.destroy', $manga->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this manga?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
