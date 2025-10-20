<h1>All Categories</h1>
<a href="{{ route('category.create') }}">Add New Category</a>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<ul>
@foreach ($categories as $category)
    <li>
        {{ $category->name }}
        <a href="{{ route('category.edit', $category->id) }}">Edit</a>
        <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>
