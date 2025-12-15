<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MangaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get categories
        $shonen = Category::where('slug', 'shonen')->first();
        $shojo = Category::where('slug', 'shojo')->first();
        $seinen = Category::where('slug', 'seinen')->first();
        $isekai = Category::where('slug', 'isekai')->first();
        $fantasy = Category::where('slug', 'fantasy')->first();
        $romance = Category::where('slug', 'romance')->first();
        $horror = Category::where('slug', 'horror')->first();
        $scifi = Category::where('slug', 'sci-fi')->first();
        $comedy = Category::where('slug', 'comedy')->first();

        if (!$shonen) {
            $this->command->error('Categories not found! Please run CategorySeeder first.');
            return;
        }

        $mangas = [
            // Jujutsu Kaisen (Featured Series)
            [
                'name' => 'Jujutsu Kaisen Vol. 0',
                'description' => 'Jujutsu Kaisen 0 is now one of the top 10 highest-grossing anime movies ever. Follow Yuta Okkotsu as he enters Tokyo Jujutsu High School.',
                'category_id' => $shonen->id,
                'price' => 750.00,
                'stock' => 25,
                'author' => 'Gege Akutami',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'jujutsu-kaisen-vol-0.jpg',
            ],
            [
                'name' => 'Jujutsu Kaisen Vol. 1',
                'description' => 'Yuji Itadori is a boy with tremendous physical strength, though he lives a completely ordinary high school life.',
                'category_id' => $shonen->id,
                'price' => 599.00,
                'stock' => 30,
                'author' => 'Gege Akutami',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'jujutsu-kaisen-vol-1.jpg',
            ],
            [
                'name' => 'Jujutsu Kaisen Vol. 2',
                'description' => 'Yuji Itadori is training to become a jujutsu sorcerer, but he must first pass the entrance exam!',
                'category_id' => $shonen->id,
                'price' => 550.00,
                'stock' => 28,
                'author' => 'Gege Akutami',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'jujutsu-kaisen-vol-2.jpg',
            ],
            [
                'name' => 'Jujutsu Kaisen Vol. 3',
                'description' => 'The Goodwill Event begins! Tokyo and Kyoto students are pitted against each other in a series of challenges.',
                'category_id' => $shonen->id,
                'price' => 550.00,
                'stock' => 27,
                'author' => 'Gege Akutami',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'jujutsu-kaisen-vol-3.jpg',
            ],
            [
                'name' => 'Jujutsu Kaisen Vol. 4',
                'description' => 'Satoru Gojo faces off against Jogo and Hanami in an epic battle showcasing his incredible power.',
                'category_id' => $shonen->id,
                'price' => 550.00,
                'stock' => 26,
                'author' => 'Gege Akutami',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'jujutsu-kaisen-vol-4.jpg',
            ],
            [
                'name' => 'Jujutsu Kaisen Vol. 5',
                'description' => 'The Death Painting arc begins as Yuji and his friends face off against powerful cursed spirits.',
                'category_id' => $shonen->id,
                'price' => 550.00,
                'stock' => 25,
                'author' => 'Gege Akutami',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'jujutsu-kaisen-vol-5.jpg',
            ],
            [
                'name' => 'Jujutsu Kaisen Vol. 6',
                'description' => 'The battle against the Death Paintings continues as the students fight for their lives.',
                'category_id' => $shonen->id,
                'price' => 550.00,
                'stock' => 24,
                'author' => 'Gege Akutami',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'jujutsu-kaisen-vol-6.jpg',
            ],
            [
                'name' => 'Jujutsu Kaisen Vol. 7',
                'description' => 'The Origin of Obedience arc begins with new challenges and powerful enemies.',
                'category_id' => $shonen->id,
                'price' => 550.00,
                'stock' => 23,
                'author' => 'Gege Akutami',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'jujutsu-kaisen-vol-7.jpg',
            ],
            [
                'name' => 'Jujutsu Kaisen Vol. 8',
                'description' => 'The battle against Mahito intensifies as Yuji learns more about his cursed energy.',
                'category_id' => $shonen->id,
                'price' => 550.00,
                'stock' => 22,
                'author' => 'Gege Akutami',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'jujutsu-kaisen-vol-8.jpg',
            ],
            [
                'name' => 'Jujutsu Kaisen Vol. 9',
                'description' => 'The Shibuya Incident arc begins, one of the most intense arcs in the series.',
                'category_id' => $shonen->id,
                'price' => 550.00,
                'stock' => 21,
                'author' => 'Gege Akutami',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'jujutsu-kaisen-vol-9.jpg',
            ],

            // Other Shonen Manga
            [
                'name' => 'One Piece Vol. 1',
                'description' => 'Join Monkey D. Luffy and his pirate crew in search of the ultimate treasure, the One Piece!',
                'category_id' => $shonen->id,
                'price' => 9.99,
                'stock' => 50,
                'author' => 'Eiichiro Oda',
                'publisher' => 'Viz Media',
                'pages' => 200,
                'image' => 'one-piece-vol-1.jpg',
            ],
            [
                'name' => 'Naruto Vol. 1',
                'description' => 'Follow Naruto Uzumaki on his journey to become the greatest ninja in his village!',
                'category_id' => $shonen->id,
                'price' => 9.99,
                'stock' => 45,
                'author' => 'Masashi Kishimoto',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'naruto-vol-1.jpg',
            ],
            [
                'name' => 'Dragon Ball Z Vol. 1',
                'description' => 'Goku and friends battle powerful enemies to protect Earth in this classic action series!',
                'category_id' => $shonen->id,
                'price' => 9.99,
                'stock' => 40,
                'author' => 'Akira Toriyama',
                'publisher' => 'Viz Media',
                'pages' => 184,
                'image' => 'dragon-ball-z-vol-1.jpg',
            ],
            [
                'name' => 'My Hero Academia Vol. 1',
                'description' => 'In a world where most people have superpowers, Izuku Midoriya dreams of becoming a hero!',
                'category_id' => $shonen->id,
                'price' => 9.99,
                'stock' => 60,
                'author' => 'Kohei Horikoshi',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'my-hero-academia-vol-1.jpg',
            ],
            [
                'name' => 'Demon Slayer Vol. 1',
                'description' => 'Tanjiro Kamado becomes a demon slayer to save his sister and avenge his family!',
                'category_id' => $shonen->id,
                'price' => 9.99,
                'stock' => 55,
                'author' => 'Koyoharu Gotouge',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'demon-slayer-vol-1.jpg',
            ],

            // Shojo
            [
                'name' => 'Fruits Basket Vol. 1',
                'description' => 'A heartwarming story about Tohru Honda and the mysterious Sohma family with a zodiac curse.',
                'category_id' => $shojo->id,
                'price' => 9.99,
                'stock' => 35,
                'author' => 'Natsuki Takaya',
                'publisher' => 'Yen Press',
                'pages' => 200,
                'image' => 'fruits-basket-vol-1.jpg',
            ],
            [
                'name' => 'Ouran High School Host Club Vol. 1',
                'description' => 'Haruhi Fujioka joins an elite host club in this hilarious reverse harem comedy!',
                'category_id' => $shojo->id,
                'price' => 9.99,
                'stock' => 30,
                'author' => 'Bisco Hatori',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'ouran-high-school-host-club-vol-1.jpg',
            ],

            // Seinen
            [
                'name' => 'Berserk Vol. 1',
                'description' => 'A dark fantasy epic following Guts, a mercenary warrior in a brutal medieval world.',
                'category_id' => $seinen->id,
                'price' => 14.99,
                'stock' => 25,
                'author' => 'Kentaro Miura',
                'publisher' => 'Dark Horse Comics',
                'pages' => 224,
                'image' => 'berserk-vol-1.jpg',
            ],
            [
                'name' => 'Tokyo Ghoul Vol. 1',
                'description' => 'Ken Kaneki becomes a half-ghoul and must navigate between human and ghoul worlds.',
                'category_id' => $seinen->id,
                'price' => 12.99,
                'stock' => 40,
                'author' => 'Sui Ishida',
                'publisher' => 'Viz Media',
                'pages' => 224,
                'image' => 'tokyo-ghoul-vol-1.jpg',
            ],

            // Isekai
            [
                'name' => 'That Time I Got Reincarnated as a Slime Vol. 1',
                'description' => 'Satoru Mikami is reincarnated as a slime in a fantasy world with incredible powers!',
                'category_id' => $isekai->id,
                'price' => 12.99,
                'stock' => 50,
                'author' => 'Fuse',
                'publisher' => 'Kodansha Comics',
                'pages' => 192,
                'image' => 'that-time-i-got-reincarnated-as-a-slime-vol-1.jpg',
            ],
            [
                'name' => 'Overlord Vol. 1',
                'description' => 'A gamer finds himself trapped in his favorite MMORPG as his powerful character!',
                'category_id' => $isekai->id,
                'price' => 13.99,
                'stock' => 45,
                'author' => 'Kugane Maruyama',
                'publisher' => 'Yen Press',
                'pages' => 256,
                'image' => 'overlord-vol-1.jpg',
            ],

            // Fantasy
            [
                'name' => 'Fullmetal Alchemist Vol. 1',
                'description' => 'Two brothers use alchemy to search for the Philosopher\'s Stone to restore their bodies.',
                'category_id' => $fantasy->id,
                'price' => 9.99,
                'stock' => 55,
                'author' => 'Hiromu Arakawa',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'fullmetal-alchemist-vol-1.jpg',
            ],
            [
                'name' => 'Attack on Titan Vol. 1',
                'description' => 'Humanity fights for survival against giant humanoid Titans in this intense series!',
                'category_id' => $fantasy->id,
                'price' => 10.99,
                'stock' => 60,
                'author' => 'Hajime Isayama',
                'publisher' => 'Kodansha Comics',
                'pages' => 208,
                'image' => 'attack-on-titan-vol-1.jpg',
            ],

            // Romance
            [
                'name' => 'Kimi ni Todoke Vol. 1',
                'description' => 'Sawako Kuronuma tries to make friends despite being misunderstood due to her appearance.',
                'category_id' => $romance->id,
                'price' => 9.99,
                'stock' => 40,
                'author' => 'Karuho Shiina',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'kimi-ni-todoke-vol-1.jpg',
            ],

            // Horror
            [
                'name' => 'Junji Ito\'s Uzumaki Vol. 1',
                'description' => 'A town becomes obsessed with spirals in this terrifying horror masterpiece.',
                'category_id' => $horror->id,
                'price' => 19.99,
                'stock' => 20,
                'author' => 'Junji Ito',
                'publisher' => 'Viz Media',
                'pages' => 208,
                'image' => 'junji-ito-uzumaki-vol-1.jpg',
            ],

            // Sci-Fi
            [
                'name' => 'Ghost in the Shell Vol. 1',
                'description' => 'In a cyberpunk future, cyborg police officer Motoko Kusanagi hunts cybercriminals.',
                'category_id' => $scifi->id,
                'price' => 16.99,
                'stock' => 30,
                'author' => 'Masamune Shirow',
                'publisher' => 'Kodansha Comics',
                'pages' => 368,
                'image' => 'ghost-in-the-shell-vol-1.jpg',
            ],

            // Comedy
            [
                'name' => 'One-Punch Man Vol. 1',
                'description' => 'Saitama can defeat any enemy with one punch, but he\'s bored with being too powerful!',
                'category_id' => $comedy->id,
                'price' => 9.99,
                'stock' => 65,
                'author' => 'ONE',
                'publisher' => 'Viz Media',
                'pages' => 200,
                'image' => 'one-punch-man-vol-1.jpg',
            ],
            [
                'name' => 'Gintama Vol. 1',
                'description' => 'In an alternate Edo period, samurai Gintoki Sakata takes odd jobs with his friends.',
                'category_id' => $comedy->id,
                'price' => 9.99,
                'stock' => 35,
                'author' => 'Hideaki Sorachi',
                'publisher' => 'Viz Media',
                'pages' => 192,
                'image' => 'gintama-vol-1.jpg',
            ],
        ];

        $created = 0;
        $skipped = 0;

        foreach ($mangas as $manga) {
            $slug = Str::slug($manga['name']);
            
            $existing = Product::where('slug', $slug)->first();
            
            if (!$existing) {
                // Handle image paths - if it's a simple filename (not a full URL or path), prepend /images/
                $imagePath = $manga['image'];
                if (!str_starts_with($imagePath, 'http') && !str_starts_with($imagePath, '/')) {
                    // For Jujutsu Kaisen, use specific subdirectory
                    if (strpos($imagePath, 'jujutsu-kaisen') !== false) {
                        $imagePath = '/images/jujutsu-kaisen/' . $imagePath;
                    } else {
                        // For other manga, use general images directory
                        $imagePath = '/images/' . $imagePath;
                    }
                }
                
                Product::create([
                    'category_id' => $manga['category_id'],
                    'name' => $manga['name'],
                    'description' => $manga['description'],
                    'slug' => $slug,
                    'price' => $manga['price'],
                    'stock' => $manga['stock'],
                    'image' => $imagePath,
                    'author' => $manga['author'],
                    'publisher' => $manga['publisher'],
                    'pages' => $manga['pages'],
                    'is_active' => true,
                ]);
                $created++;
            } else {
                $skipped++;
            }
        }

        if ($created > 0) {
            $this->command->info("Manga seeded successfully! Created: {$created}, Skipped: {$skipped}");
        } else {
            $this->command->info("All manga already exist. Skipped: {$skipped}");
        }
    }
}

