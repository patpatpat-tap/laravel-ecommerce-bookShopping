<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Category | MangaVerse</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-indigo-900 to-black text-white min-h-screen">

    <nav class="flex justify-between items-center p-6 bg-gray-800/70 shadow-lg">
        <h1 class="text-2xl font-bold text-indigo-400">Add New Category</h1>
        <a href="{{ route('dashboard') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold">← Back to Dashboard</a>
    </nav>

    <main class="flex justify-center items-center h-[80vh]">
        <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-indigo-600/30 w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-indigo-400">Create Category</h2>

            @if ($errors->any())
                <div class="bg-red-600/20 text-red-300 p-3 rounded mb-4">
                    <ul class="list-disc pl-6 text-sm">
                        @foreach ($errors->
