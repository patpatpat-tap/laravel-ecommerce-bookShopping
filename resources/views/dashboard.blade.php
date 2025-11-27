<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>MangaVerse | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@400;500;700;900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,0" rel="stylesheet"/>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#a413ec",
                        "background-light": "#f7f6f8",
                        "background-dark": "#1c1022",
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "sans-serif"]
                    }
                },
            },
        }
    </script>
</head>
<body class="font-display bg-background-light dark:bg-background-dark">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="sticky top-0 z-50 border-b border-solid border-white/10 dark:border-b-[#3c2348] bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm">
            <div class="flex items-center justify-between px-4 sm:px-10 py-3 max-w-7xl mx-auto">
                <div class="flex items-center gap-8">
                    <!-- Logo -->
                    <div class="flex items-center gap-3 text-black dark:text-white">
                        <svg class="h-8 w-8 text-primary" fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z" fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                        <h2 class="text-black dark:text-white text-lg font-bold">MangaVerse</h2>
                    </div>
                    
                    <!-- Navigation -->
                    <nav class="hidden md:flex items-center gap-9">
                        <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium" href="{{ route('manga.index') }}">Browse Manga</a>
                        <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium" href="#">My Cart</a>
                        <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium" href="#">Orders</a>
                    </nav>
                </div>
                
                <!-- User Actions -->
                <div class="flex items-center gap-3 sm:gap-6">
                    <!-- Search Button (Mobile) -->
                    <button class="flex sm:hidden items-center justify-center rounded-lg h-10 bg-gray-200 dark:bg-[#3c2348] text-black dark:text-white gap-2 text-sm font-bold px-2.5">
                        <span class="material-symbols-outlined text-xl">search</span>
                    </button>
                    
                    <!-- User & Cart -->
                    <div class="flex gap-2">
                        <button class="flex items-center justify-center rounded-lg h-10 bg-gray-200 dark:bg-[#3c2348] text-black dark:text-white gap-2 text-sm font-bold px-2.5">
                            <span class="material-symbols-outlined text-xl">person</span>
                            <span class="hidden sm:inline">Welcome, {{ Auth::user()->name }}</span>
                        </button>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="flex items-center justify-center rounded-lg h-10 bg-red-600 hover:bg-red-700 text-white gap-2 text-sm font-bold px-4 transition-colors">
                                <span class="material-symbols-outlined text-xl">logout</span>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1">
            <div class="px-4 sm:px-10 py-5 max-w-7xl mx-auto">
                <!-- Welcome Section -->
                <div class="flex flex-col gap-8 items-center text-center py-8 px-4">
                    <h1 class="text-black dark:text-white text-3xl sm:text-4xl font-bold max-w-2xl">Welcome back, {{ Auth::user()->name }}! 👋</h1>
                    <p class="text-gray-600 dark:text-gray-300 text-base sm:text-lg max-w-xl">Continue your manga journey. Discover new adventures and manage your collection.</p>
                    
                    <!-- Search Bar -->
                    <div class="w-full max-w-2xl">
                        <label class="flex flex-col w-full">
                            <div class="flex w-full items-stretch rounded-full h-14 shadow-lg">
                                <div class="text-gray-400 dark:text-[#b792c9] flex border-none bg-gray-100 dark:bg-[#3c2348] items-center justify-center pl-6 pr-2 rounded-l-full">
                                    <span class="material-symbols-outlined text-2xl">search</span>
                                </div>
                                <input class="flex w-full min-w-0 flex-1 rounded-full text-black dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary focus:ring-inset border-none bg-gray-100 dark:bg-[#3c2348] placeholder:text-gray-500 dark:placeholder:text-[#b792c9] px-4 rounded-l-none text-base" placeholder="Search by title, author, or genre..." value=""/>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white dark:bg-[#2a1a33] p-6 rounded-xl shadow-lg border border-gray-200 dark:border-[#3c2348]">
                        <div class="flex items-center gap-3">
                            <div class="p-3 bg-primary/10 rounded-lg">
                                <span class="material-symbols-outlined text-primary text-2xl">auto_stories</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-black dark:text-white">{{ count($mangas) }}</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Total Manga</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-[#2a1a33] p-6 rounded-xl shadow-lg border border-gray-200 dark:border-[#3c2348]">
                        <div class="flex items-center gap-3">
                            <div class="p-3 bg-primary/10 rounded-lg">
                                <span class="material-symbols-outlined text-primary text-2xl">category</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-black dark:text-white">{{ count($categories) }}</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Categories</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-[#2a1a33] p-6 rounded-xl shadow-lg border border-gray-200 dark:border-[#3c2348]">
                        <div class="flex items-center gap-3">
                            <div class="p-3 bg-primary/10 rounded-lg">
                                <span class="material-symbols-outlined text-primary text-2xl">trending_up</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-black dark:text-white">0</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Orders Today</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trending Section -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-black dark:text-white mb-6">🔥 Trending Now</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                        @foreach($mangas->take(5) as $manga)
                        <div class="group flex flex-col">
                            <div class="relative overflow-hidden rounded-xl shadow-lg group-hover:shadow-2xl transition-shadow duration-300">
                                @if($manga->cover_image)
                                    <img class="aspect-[2/3] w-full object-cover transition-transform duration-300 group-hover:scale-105" src="{{ asset('images/' . $manga->cover_image) }}" alt="{{ $manga->title }}"/>
                                @else
                                    <div class="aspect-[2/3] w-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-gray-500 text-4xl">image</span>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <button class="absolute top-2 right-2 flex items-center justify-center w-8 h-8 rounded-full bg-black/40 text-white backdrop-blur-sm hover:bg-primary transition-colors">
                                    <span class="material-symbols-outlined text-lg">favorite</span>
                                </button>
                            </div>
                            <div class="pt-3">
                                <h3 class="font-bold text-base text-black dark:text-white truncate">{{ $manga->title }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $manga->author }}</p>
                                <p class="font-bold text-primary mt-1">${{ number_format($manga->price, 2) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Main Content with Sidebar -->
                <div class="flex flex-col lg:flex-row gap-10">
                    <!-- Sidebar -->
                    <aside class="w-full lg:w-64 shrink-0">
                        <h2 class="text-black dark:text-white text-lg font-bold mb-4">Categories</h2>
                        <div class="flex flex-row lg:flex-col gap-2 overflow-x-auto pb-2 lg:pb-0">
                            @foreach($categories as $category)
                            <a class="flex items-center gap-3 p-3 rounded-lg text-black dark:text-white hover:bg-primary/10 dark:hover:bg-primary/20 transition-colors w-full shrink-0 lg:shrink" href="#">
                                <span class="material-symbols-outlined text-primary">category</span>
                                <span>{{ $category['name'] }}</span>
                            </a>
                            @endforeach
                            <a href="{{ route('category.create') }}" class="flex items-center gap-3 p-3 rounded-lg text-black dark:text-white hover:bg-primary/10 dark:hover:bg-primary/20 transition-colors w-full shrink-0 lg:shrink border-2 border-dashed border-primary/30">
                                <span class="material-symbols-outlined text-primary">add</span>
                                <span>Add Category</span>
                            </a>
                        </div>
                    </aside>

                    <!-- Manga Grid -->
                    <div class="flex-1">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-black dark:text-white">All Manga</h2>
                            <a href="#" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                Add Manga
                            </a>
                        </div>

                        @if (session('success'))
                            <div class="bg-green-900 text-green-300 p-3 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(count($mangas) > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($mangas as $manga)
                            <div class="group flex flex-col">
                                <div class="relative overflow-hidden rounded-xl shadow-lg group-hover:shadow-2xl transition-shadow duration-300">
                                    @if($manga->cover_image)
                                        <img class="aspect-[2/3] w-full object-cover transition-transform duration-300 group-hover:scale-105" src="{{ asset('images/' . $manga->cover_image) }}" alt="{{ $manga->title }}"/>
                                    @else
                                        <div class="aspect-[2/3] w-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="material-symbols-outlined text-gray-500 text-4xl">image</span>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <button class="absolute top-2 right-2 flex items-center justify-center w-8 h-8 rounded-full bg-black/40 text-white backdrop-blur-sm hover:bg-primary transition-colors">
                                        <span class="material-symbols-outlined text-lg">favorite</span>
                                    </button>
                                </div>
                                <div class="pt-3">
                                    <h3 class="font-bold text-base text-black dark:text-white truncate">{{ $manga->title }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $manga->author }}</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">{{ $manga->category->name ?? 'No Category' }}</p>
                                    <p class="font-bold text-primary mt-1">${{ number_format($manga->price, 2) }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center py-12">
                            <span class="material-symbols-outlined text-6xl text-gray-400 mb-4">auto_stories</span>
                            <p class="text-gray-500 dark:text-gray-400 text-lg">No manga available yet.</p>
                            <a href="#" class="inline-block mt-4 bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg font-semibold transition-colors">
                                Add Your First Manga
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>