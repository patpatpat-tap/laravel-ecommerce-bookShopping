<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MangaVerse | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen">

    <!-- Navigation -->
    <nav class="flex justify-between items-center p-6 bg-gray-900 shadow-lg">
        <h1 class="text-2xl font-bold text-white">MangaVerse Dashboard</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg font-semibold">
                Logout
            </button>
        </form>
    </nav>

    <!-- Main Content -->
    <main class="p-10">
        <div class="text-center mb-10">
            <h2 class="text-4xl font-extrabold mb-4">Welcome, {{ Auth::user()->name }}</h2>
            <p class="text-gray-400">You’re now logged in to your MangaVerse dashboard.</p>
        </div>

        <!-- Dashboard Sections -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto mb-10">
            <div class="bg-gray-900 p-6 rounded-lg shadow-lg border border-gray-700">
                <h3 class="text-lg font-bold mb-2 text-white">Browse Manga</h3>
                <p class="text-gray-400 mb-3">Explore your favorite manga series.</p>
                <a href="#" class="text-gray-300 hover:text-white">Go →</a>
            </div>

            <div class="bg-gray-900 p-6 rounded-lg shadow-lg border border-gray-700">
                <h3 class="text-lg font-bold mb-2 text-white">My Cart</h3>
                <p class="text-gray-400 mb-3">Check or edit your cart items.</p>
                <a href="#" class="text-gray-300 hover:text-white">View →</a>
            </div>

            <div class="bg-gray-900 p-6 rounded-lg shadow-lg border border-gray-700">
                <h3 class="text-lg font-bold mb-2 text-white">Orders</h3>
                <p class="text-gray-400 mb-3">Track your current and past orders.</p>
                <a href="#" class="text-gray-300 hover:text-white">Track →</a>
            </div>
        </div>

        <!-- Category Section -->
        <section class="bg-gray-900 p-8 rounded-lg shadow-lg max-w-5xl mx-auto border border-gray-700 text-left mb-10">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-white">Categories</h3>
                <a href="{{ route('category.create') }}" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg text-sm font-semibold">
                    Add Category
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-900 text-green-300 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (count($categories) > 0)
                <table class="w-full border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-800 text-gray-300">
                            <th class="py-3 px-4 text-left">#</th>
                            <th class="py-3 px-4 text-left">Category Name</th>
                            <th class="py-3 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr class="border-b border-gray-700 hover:bg-gray-800">
                                <td class="py-3 px-4">{{ $index + 1 }}</td>
                                <td class="py-3 px-4">{{ $category['name'] }}</td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('category.edit', $category['id']) }}" class="text-gray-300 hover:text-white mr-3">Edit</a>
                                    <form action="{{ route('category.destroy', $category['id']) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-400">No categories available yet.</p>
            @endif
        </section>

        <!-- Manga Section -->
        <section class="bg-gray-900 p-8 rounded-lg shadow-lg max-w-5xl mx-auto border border-gray-700 text-left">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-white">Mangas</h3>
                <a href="#" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg text-sm font-semibold">
                    Add Manga
                </a>
            </div>

            @if (count($mangas) > 0)
                <table class="w-full border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-800 text-gray-300">
                            <th class="py-3 px-4 text-left">#</th>
                            <th class="py-3 px-4 text-left">Cover</th>
                            <th class="py-3 px-4 text-left">Title</th>
                            <th class="py-3 px-4 text-left">Author</th>
                            <th class="py-3 px-4 text-left">Category</th>
                            <th class="py-3 px-4 text-left">Price</th>
                            <th class="py-3 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mangas as $index => $manga)
                            <tr class="border-b border-gray-700 hover:bg-gray-800">
                                <td class="py-3 px-4">{{ $index + 1 }}</td>
                                <td class="py-3 px-4">
                                    @if($manga->cover_image)
                                        <img src="{{ asset('images/' . $manga->cover_image) }}" alt="{{ $manga->title }}" class="w-24 h-32 object-cover rounded">
                                    @else
                                        <span class="text-gray-400">No Image</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">{{ $manga->title }}</td>
                                <td class="py-3 px-4">{{ $manga->author }}</td>
                                <td class="py-3 px-4">{{ $manga->category->name ?? 'N/A' }}</td>
                                <td class="py-3 px-4">${{ number_format($manga->price, 2) }}</td>
                                <td class="py-3 px-4">
                                    <a href="#" class="text-gray-300 hover:text-white mr-3">View</a>
                                    <a href="#" class="text-gray-300 hover:text-white mr-3">Edit</a>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-400">No mangas available yet.</p>
            @endif
        </section>
    </main>

</body>
</html>
