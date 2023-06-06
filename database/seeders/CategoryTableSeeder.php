<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title' => 'Celebrity',
            'content' => 'Content of celebrity category',
            'url' => 'https://google.com/category/celebrity',
        ]);

        Category::factory()->count(10)->create();
    }
}
