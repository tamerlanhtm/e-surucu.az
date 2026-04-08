<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Yol xəbərləri', 'slug' => 'yol-xeberleri'],
            ['name' => 'Qanun dəyişikliyi', 'slug' => 'qanun-deyisikliyi'],
            ['name' => 'Təhlükəsizlik', 'slug' => 'tehlukesizlik'],
            ['name' => 'Məsləhətlər', 'slug' => 'meslehetler'],
        ];

        foreach ($categories as $category) {
            \App\Models\NewsCategory::create($category);
        }
    }
}
