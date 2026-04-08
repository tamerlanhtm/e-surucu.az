<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Yol nişanları', 'slug' => 'yol-nisanlari'],
            ['name' => 'Yol hərəkəti qaydaları', 'slug' => 'yol-hereketi-qaydalari'],
            ['name' => 'Texniki suallar', 'slug' => 'texniki-suallar'],
        ];

        foreach ($categories as $category) {
            \App\Models\QuestionCategory::create($category);
        }
    }
}
