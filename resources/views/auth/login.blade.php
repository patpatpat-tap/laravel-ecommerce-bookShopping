<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MangaVerse | Join the Community</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-black via-indigo-900 to-gray-900 text-white min-h-screen flex items-center justify-center p-4">

    <div class="bg-gray-800/70 backdrop-blur-lg p-8 rounded-2xl shadow-2xl w-full max-w-md border border-indigo-600/30">
        <!-- Tabs -->
        <div class="flex mb-6 bg-gray-900/50 rounded-lg p-1">
            <button id="login-tab" class="flex-1 py-2 px-4 rounded-md font-semibold transition-all duration-200 bg-indigo-600 text-white shadow">
                Login
            </button>
            <button id="register-tab" class="flex-1 py-2 px-4 rounded-md font-semibold transition-all duration-200 text-gray-400 hover:text-white">
                Register
            </button>
        </div>

        <h1 class="text-4xl font-extrabold text-center mb-2 text-indigo-400 drop-shadow-md">
            <span id="form-title">Welcome to</span> <span class="text-white">MangaVerse</span>
        </h1>
        <p id="form-subtitle" class="text-center text-gray-400 mb-6">Sign in to continue your manga journey 📖</p>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-500 text-red-300 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Login Form -->
        <form id="login-form" method="POST" action="{{ route('login.submit') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
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

        <!-- Register Form -->
        <form id="register-form" method="POST" action="{{ route('register.submit') }}" class="space-y-5 hidden">
            @csrf
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:border-indigo-400 transition">
            </div>

            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:border-indigo-400 transition">
            </div>

            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Password</label>
                <input type="password" name="password" required minlength="6"
                    class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:border-indigo-400 transition">
            </div>

            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-300">Confirm Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full p-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:border-indigo-400 transition">
            </div>

            <button type="submit"
                class="w-full py-3 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-lg transition duration-200 shadow-md">
                Create Account
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const formTitle = document.getElementById('form-title');
            const formSubtitle = document.getElementById('form-subtitle');

            function showLogin() {
                // Update tabs
                loginTab.classList.add('bg-indigo-600', 'text-white');
                loginTab.classList.remove('text-gray-400');
                registerTab.classList.remove('bg-indigo-600', 'text-white');
                registerTab.classList.add('text-gray-400');
                
                // Update forms
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                
                // Update text content
                formTitle.textContent = 'Welcome to';
                formSubtitle.textContent = 'Sign in to continue your manga journey 📖';
            }

            function showRegister() {
                // Update tabs
                registerTab.classList.add('bg-indigo-600', 'text-white');
                registerTab.classList.remove('text-gray-400');
                loginTab.classList.remove('bg-indigo-600', 'text-white');
                loginTab.classList.add('text-gray-400');
                
                // Update forms
                registerForm.classList.remove('hidden');
                loginForm.classList.add('hidden');
                
                // Update text content
                formTitle.textContent = 'Join';
                formSubtitle.textContent = 'Create your account and start reading epic manga adventures ⚡';
            }

            // Event listeners
            loginTab.addEventListener('click', showLogin);
            registerTab.addEventListener('click', showRegister);

            // Show appropriate form based on validation errors or if coming from register
            @if($errors->any() && old('name'))
                // If there are errors and we have name field, it's a register error - show register form
                showRegister();
            @elseif(request()->has('show') && request('show') === 'register')
                // If URL has ?show=register parameter, show register form
                showRegister();
            @else
                // Otherwise default to login
                showLogin();
            @endif
        });
    </script>
</body>
</html>