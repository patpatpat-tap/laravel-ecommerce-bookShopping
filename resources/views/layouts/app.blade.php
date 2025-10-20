<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangaverse</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-gray-100 font-sans">

    <nav class="bg-gray-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-red-500">Mangaverse</h1>

            <div class="flex items-center space-x-4">
                @auth
                    <form action="{{ route('manga.index') }}" method="GET" class="flex items-center">
                        <input
                            type="text"
                            name="search"
                            placeholder="Search manga..."
                            class="px-3 py-2 rounded-l-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500"
                            value="{{ request('search') }}"
                        >
                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-r-md font-semibold"
                        >
                            Search
                        </button>
                    </form>

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-300 hover:text-white px-3">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>
