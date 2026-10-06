<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Teknologi',
            'description' => 'Buku tentang komputer dan teknologi',
        ]);

        Category::create([
            'name' => 'Novel',
            'description' => 'Buku cerita dan fiksi',
        ]);

        Category::create([
            'name' => 'Pendidikan',
            'description' => 'Buku pembelajaran dan pendidikan',
        ]);
    }
}