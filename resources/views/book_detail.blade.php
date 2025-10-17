@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        @if ($book->image)
            <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid rounded">
        @else
            <img src="https://via.placeholder.com/250x300" class="img-fluid rounded">
        @endif
    </div>

    <div class="col-md-8">
        <h3>{{ $book->title }}</h3>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p>{{ $book->description }}</p>
        <h4 class="text-success">₱{{ number_format($book->price, 2) }}</h4>

        <a href="{{ route('cart.add', $book->id) }}" class="btn btn-success mt-3">Add to Cart</a>
        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
    </div>
</div>
@endsection
