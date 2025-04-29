<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categoryIds = [1,2,3,4,5,6,7,8,9,10];

        for ($i = 1; $i <= 20; $i++) {
            DB::table('products')->insert([
                'code' => 'PRD' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'name_of' => $faker->words(3, true),
                'description' => $faker->sentence(10),
                'img_path' => 'images/products/sample_' . $i . '.jpg',
                'is_active' => 'Y',
                'price' => $faker->randomFloat(2, 50, 999),
                'main_category_id' => $faker->randomElement($categoryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
