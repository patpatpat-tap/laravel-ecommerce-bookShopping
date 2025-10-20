<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MangaSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Action', 'Adventure', 'Romance', 'Comedy', 'Fantasy',
            'Horror', 'Drama', 'Slice of Life', 'Sci-Fi', 'Mystery'
        ];

        // Insert categories
        foreach ($categories as $cat) {
            DB::table('categories')->insert(['name' => $cat]);
        }

        $mangas = [
            [
                'title' => 'Attack on Titan',
                'author' => 'Hajime Isayama',
                'category_id' => 1,
                'description' => 'In a world besieged by titans, humanity hides behind giant walls until a breach changes everything.',
                'price' => 499.00,
                'cover_image' => 'aot.jpg',
            ],
            [
                'title' => 'Demon Slayer: Kimetsu no Yaiba',
                'author' => 'Koyoharu Gotouge',
                'category_id' => 1,
                'description' => 'Tanjiro Kamado sets out to save his sister Nezuko and avenge his family from demons.',
                'price' => 450.00,
                'cover_image' => 'demonslayer.jpg',
            ],
            [
                'title' => 'One Piece',
                'author' => 'Eiichiro Oda',
                'category_id' => 2,
                'description' => 'Monkey D. Luffy sails the seas in search of the ultimate treasure known as the One Piece.',
                'price' => 520.00,
                'cover_image' => 'onepiece.jpg',
            ],
            [
                'title' => 'Naruto',
                'author' => 'Masashi Kishimoto',
                'category_id' => 1,
                'description' => 'A young ninja dreams of becoming the strongest and earning the title of Hokage.',
                'price' => 480.00,
                'cover_image' => 'naruto.jpg',
            ],
            [
                'title' => 'Jujutsu Kaisen',
                'author' => 'Gege Akutami',
                'category_id' => 1,
                'description' => 'Yuji Itadori fights curses alongside other sorcerers at Tokyo Jujutsu High.',
                'price' => 470.00,
                'cover_image' => 'jjk.jpg',
            ],
            [
                'title' => 'My Hero Academia',
                'author' => 'Kohei Horikoshi',
                'category_id' => 1,
                'description' => 'In a world of superpowers, Izuku Midoriya strives to become the greatest hero.',
                'price' => 460.00,
                'cover_image' => 'mha.jpg',
            ],
            [
                'title' => 'Tokyo Ghoul',
                'author' => 'Sui Ishida',
                'category_id' => 6,
                'description' => 'Kaneki struggles with his humanity after becoming a half-ghoul.',
                'price' => 490.00,
                'cover_image' => 'tokyoghoul.jpg',
            ],
            [
                'title' => 'Death Note',
                'author' => 'Tsugumi Ohba',
                'category_id' => 10,
                'description' => 'A student finds a notebook that lets him kill anyone by writing their name.',
                'price' => 430.00,
                'cover_image' => 'deathnote.jpg',
            ],
            [
                'title' => 'Chainsaw Man',
                'author' => 'Tatsuki Fujimoto',
                'category_id' => 1,
                'description' => 'Denji merges with his pet devil and becomes Chainsaw Man to fight other devils.',
                'price' => 500.00,
                'cover_image' => 'chainsawman.jpg',
            ],
            [
                'title' => 'Blue Lock',
                'author' => 'Muneyuki Kaneshiro',
                'category_id' => 2,
                'description' => 'Japan builds a ruthless training camp to find the best striker in the world.',
                'price' => 440.00,
                'cover_image' => 'bluelock.jpg',
            ],
            [
                'title' => 'Spy x Family',
                'author' => 'Tatsuya Endo',
                'category_id' => 4,
                'description' => 'A spy creates a fake family for a mission, unaware they all have secrets.',
                'price' => 460.00,
                'cover_image' => 'spyxfamily.jpg',
            ],
            [
                'title' => 'Solo Leveling',
                'author' => 'Chugong',
                'category_id' => 5,
                'description' => 'A weak hunter gains the power to level up infinitely after surviving a deadly dungeon.',
                'price' => 520.00,
                'cover_image' => 'sololeveling.jpg',
            ],
            [
                'title' => 'Fullmetal Alchemist',
                'author' => 'Hiromu Arakawa',
                'category_id' => 5,
                'description' => 'Two brothers search for the Philosopher’s Stone to restore their bodies after a failed ritual.',
                'price' => 470.00,
                'cover_image' => 'fma.jpg',
            ],
            [
                'title' => 'Black Clover',
                'author' => 'Yūki Tabata',
                'category_id' => 5,
                'description' => 'Asta, a boy born without magic, aims to become the Wizard King.',
                'price' => 480.00,
                'cover_image' => 'blackclover.jpg',
            ],
            [
                'title' => 'Haikyuu!!',
                'author' => 'Haruichi Furudate',
                'category_id' => 2,
                'description' => 'Hinata dreams of becoming a volleyball champion despite his height.',
                'price' => 420.00,
                'cover_image' => 'haikyuu.jpg',
            ],
            [
                'title' => 'Dr. Stone',
                'author' => 'Riichiro Inagaki',
                'category_id' => 9,
                'description' => 'After humanity turns to stone, a genius rebuilds civilization using science.',
                'price' => 460.00,
                'cover_image' => 'drstone.jpg',
            ],
            [
                'title' => 'Your Lie in April',
                'author' => 'Naoshi Arakawa',
                'category_id' => 7,
                'description' => 'A piano prodigy rediscovers his passion through a free-spirited violinist.',
                'price' => 430.00,
                'cover_image' => 'yourlieinapril.jpg',
            ],
            [
                'title' => 'Oshi no Ko',
                'author' => 'Aka Akasaka',
                'category_id' => 7,
                'description' => 'The story of twins reincarnated as the children of a famous idol.',
                'price' => 480.00,
                'cover_image' => 'oshinoko.jpg',
            ],
            [
                'title' => 'Fairy Tail',
                'author' => 'Hiro Mashima',
                'category_id' => 2,
                'description' => 'A young mage joins a guild of powerful wizards and embarks on thrilling quests.',
                'price' => 450.00,
                'cover_image' => 'fairytail.jpg',
            ],
            [
                'title' => 'Re:Zero',
                'author' => 'Tappei Nagatsuki',
                'category_id' => 9,
                'description' => 'Subaru is trapped in a fantasy world where he returns to life each time he dies.',
                'price' => 490.00,
                'cover_image' => 'rezero.jpg',
            ],
        ];

        DB::table('mangas')->insert($mangas);
    }
}
