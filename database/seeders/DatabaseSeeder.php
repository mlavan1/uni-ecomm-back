<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeders = [
            MajorCategorySeeder::class,
            SubCategorySeeder::class,
            BrandSeeder::class,
            ScaleSeeder::class,
            ProductSeeder::class,
        ];

        foreach ($seeders as $seeder) {
            $this->call($seeder);
            $this->command->info("✅ {$seeder} completed.");
            $this->command->line('');
        }
    }
}
