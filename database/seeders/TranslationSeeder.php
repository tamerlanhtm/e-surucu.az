<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing translations
        Translation::truncate();

        // Get all translation groups from language files
        $locales = ['az', 'ru', 'en'];
        $groups = ['ui', 'auth'];

        foreach ($groups as $group) {
            $translations = [];

            // Load translations for each locale
            foreach ($locales as $locale) {
                $filePath = base_path("lang/{$locale}/{$group}.php");

                if (file_exists($filePath)) {
                    $translations[$locale] = require $filePath;
                }
            }

            // Get all unique keys from all locales
            $allKeys = [];
            foreach ($translations as $locale => $trans) {
                $allKeys = array_merge($allKeys, array_keys($trans));
            }
            $allKeys = array_unique($allKeys);

            // Insert each translation key
            foreach ($allKeys as $key) {
                Translation::create([
                    'key' => "{$group}.{$key}",
                    'group' => $group,
                    'text_az' => $translations['az'][$key] ?? null,
                    'text_ru' => $translations['ru'][$key] ?? null,
                    'text_en' => $translations['en'][$key] ?? null,
                ]);
            }
        }

        $this->command->info('✅ Translations imported successfully!');
        $this->command->info('📊 Total: ' . Translation::count() . ' translation keys');
    }
}
