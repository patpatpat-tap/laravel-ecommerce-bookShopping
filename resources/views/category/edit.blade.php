<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category | MangaVerse</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-indigo-900 to-black text-white min-h-screen">

    <nav class="flex justify-between items-center p-6 bg-gray-800/70 shadow-lg">
        <h1 class="text-2xl font-bold text-indigo-400">Edit Category</h1>
        <a href="{{ route('dashboard') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold">← Back to Dashboard</a>
    </nav>

    <main class="flex justify-center items-center h-[80vh]">
        <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-indigo-600/30 w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-indigo-400">Update Category</h2>

            @if ($errors->any())
                <div class="bg-red-600/20 text-red-300 p-3 rounded mb-4">
                    <ul class="list-disc pl-6 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('category.update', $category['id']) }}">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-semibold">Category Name</label>
                    <input type="text" name="name" id="name" value="{{ $category['name'] }}" class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3 rounded-lg transition">
                    Update Category
                </button>
            </form>
        </div>
    </main>

</body>
</html>
