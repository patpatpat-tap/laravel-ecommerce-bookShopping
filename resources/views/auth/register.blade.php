<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MangaVerse | Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-black via-indigo-900 to-gray-900 text-white min-h-screen flex items-center justify-center">

    <div class="bg-gray-800/70 backdrop-blur-lg p-8 rounded-2xl shadow-2xl w-full max-w-md border border-indigo-600/30">
        <h1 class="text-4xl font-extrabold text-center mb-6 text-indigo-400 drop-shadow-md">
            Join <span class="text-white">MangaVerse</span>
        </h1>
        <p class="text-center text-gray-400 mb-6">Create your account and start reading epic manga adventures ⚡</p>

        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-500 text-red-300 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Name</label>
                <input type="text" name="name" required autofocus
                    class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:border-indigo-400 transition">
            </div>

            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Email</label>
                <input type="email" name="email" required
                    class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:border-indigo-400 transition">
            </div>

            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Password</label>
                <input type="password" name="password" required
                    class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:border-indigo-400 transition">
            </div>

            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Confirm Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:border-indigo-400 transition">
            </div>

            <button type="submit"
                class="w-full py-3 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-lg transition duration-200 shadow-md">
                Register
            </button>
        </form>

        <p class="mt-6 text-center text-gray-400 text-sm">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold transition">Login here</a>
        </p>
    </div>

</body>
</html>
