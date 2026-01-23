<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Chairs',
                'slug' => 'chairs',
            ],
            [
                'name' => 'Sofas',
                'slug' => 'sofas',
            ],
            [
                'name' => 'Tables',
                'slug' => 'tables',
            ],
            [
                'name' => 'Ottomans',
                'slug' => 'ottomans',
            ],
            [
                'name' => 'Accessories',
                'slug' => 'accessories',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
