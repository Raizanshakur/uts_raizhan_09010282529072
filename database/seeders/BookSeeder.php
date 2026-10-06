<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $teknologi = Category::where('name', 'Teknologi')->firstOrFail();
        $novel = Category::where('name', 'Novel')->firstOrFail();
        $pendidikan = Category::where('name', 'Pendidikan')->firstOrFail();

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Belajar Laravel',
            'author' => 'Andi Setiawan',
            'publisher' => 'Informatika',
            'year' => 2025,
            'stock' => 10,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Dasar Pemrograman Web',
            'author' => 'Budi Raharjo',
            'publisher' => 'Media Komputindo',
            'year' => 2024,
            'stock' => 8,
        ]);

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'year' => 2005,
            'stock' => 5,
        ]);

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Bumi',
            'author' => 'Tere Liye',
            'publisher' => 'Gramedia',
            'year' => 2014,
            'stock' => 7,
        ]);

        Book::create([
            'category_id' => $pendidikan->id,
            'title' => 'Matematika Dasar',
            'author' => 'Rina Kartika',
            'publisher' => 'Erlangga',
            'year' => 2023,
            'stock' => 12,
        ]);
    }
}