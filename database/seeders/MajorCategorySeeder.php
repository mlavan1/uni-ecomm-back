<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('major_categories')->insert([
            [
                'code' => 'ELEC',
                'name_of' => 'Electronics',
                'icon' => 'icon-electronics.png',
                'img_path' => 'images/categories/electronics.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'FASH',
                'name_of' => 'Fashion',
                'icon' => 'icon-fashion.png',
                'img_path' => 'images/categories/fashion.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'HOME',
                'name_of' => 'Home & Living',
                'icon' => 'icon-home.png',
                'img_path' => 'images/categories/home.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SPORT',
                'name_of' => 'Sports',
                'icon' => 'icon-sports.png',
                'img_path' => 'images/categories/sports.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'BOOK',
                'name_of' => 'Books',
                'icon' => 'icon-books.png',
                'img_path' => 'images/categories/books.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'TOYS',
                'name_of' => 'Toys & Games',
                'icon' => 'icon-toys.png',
                'img_path' => 'images/categories/toys.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'BEAU',
                'name_of' => 'Beauty & Health',
                'icon' => 'icon-beauty.png',
                'img_path' => 'images/categories/beauty.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'AUTO',
                'name_of' => 'Automotive',
                'icon' => 'icon-automotive.png',
                'img_path' => 'images/categories/automotive.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'PET',
                'name_of' => 'Pet Supplies',
                'icon' => 'icon-pet.png',
                'img_path' => 'images/categories/pet.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'GROC',
                'name_of' => 'Groceries',
                'icon' => 'icon-groceries.png',
                'img_path' => 'images/categories/groceries.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
