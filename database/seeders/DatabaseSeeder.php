<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run seeders in order
        $this->call([
            AdminUserSeeder::class,  // Create admin user first
            CategorySeeder::class,    // Create categories second (manga need categories)
            MangaSeeder::class,       // Create all manga including Jujutsu Kaisen (depends on categories)
        ]);
    }
}
