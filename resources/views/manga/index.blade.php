@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Explore Manga Collection</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($mangas as $manga)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300 cursor-pointer">
                <img src="{{ asset('images/' . $manga->cover_image) }}" alt="{{ $manga->title }}" class="w-full h-80 object-cover">
                <div class="p-6">
                    <h2 class="font-bold text-xl mb-2 text-gray-900">{{ $manga->title }}</h2>
                    <p class="text-gray-600 text-sm mb-2">by {{ $manga->author }}</p>
                    <p class="text-gray-700 text-sm mb-4 line-clamp-2">{{ Str::limit($manga->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-green-600">${{ number_format($manga->price, 2) }}</span>
                        <a href="{{ route('manga.show', $manga->id) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">Buy Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
