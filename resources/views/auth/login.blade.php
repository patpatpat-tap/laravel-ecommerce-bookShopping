<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MangaVerse | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-black via-indigo-900 to-gray-900 text-white min-h-screen flex items-center justify-center">

    <div class="bg-gray-800/70 backdrop-blur-lg p-8 rounded-2xl shadow-2xl w-full max-w-md border border-indigo-600/30">
        <h1 class="text-4xl font-extrabold text-center mb-6 text-indigo-400 drop-shadow-md">
            Welcome to <span class="text-white">MangaVerse</span>
        </h1>
        <p class="text-center text-gray-400 mb-6">Sign in to continue your manga journey 📖</p>

        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-500 text-red-300 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
            @csrf <!-- 🧠 CRITICAL -->
            
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Email</label>
                <input type="email" name="email" required autofocus
                    class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:border-indigo-400 transition">
            </div>

            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Password</label>
                <input type="password" name="password" required
                    class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:border-indigo-400 transition">
            </div>

            <button type="submit"
                class="w-full py-3 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-lg transition duration-200 shadow-md">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-gray-400 text-sm">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold transition">Register here</a>
        </p>
    </div>

</body>
</html>
