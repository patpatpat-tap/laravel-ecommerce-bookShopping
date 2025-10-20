<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Action',
                'description' => 'Stories filled with intense battles, adventures, and physical challenges.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adventure',
                'description' => 'Follows characters as they explore unknown worlds or go on grand journeys.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fantasy',
                'description' => 'Contains elements of magic, mythical creatures, and supernatural worlds.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Drama',
                'description' => 'Focuses on emotional and character-driven storytelling.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Romance',
                'description' => 'Centers on love stories and emotional relationships between characters.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Comedy',
                'description' => 'Aims to entertain readers with humor, jokes, and funny situations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Supernatural',
                'description' => 'Involves spirits, curses, or phenomena beyond the natural world.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Horror',
                'description' => 'Evokes fear through eerie themes, monsters, or psychological terror.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
