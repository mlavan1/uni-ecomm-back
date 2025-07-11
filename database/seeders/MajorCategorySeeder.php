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
                'img_path' => '1.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'FASH',
                'name_of' => 'Fashion',
                'icon' => 'icon-fashion.png',
                'img_path' => '2.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'HOME',
                'name_of' => 'Home & Living',
                'icon' => 'icon-home.png',
                'img_path' => '3.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SPORT',
                'name_of' => 'Sports',
                'icon' => 'icon-sports.png',
                'img_path' => '4.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'BOOK',
                'name_of' => 'Books',
                'icon' => 'icon-books.png',
                'img_path' => '5.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'TOYS',
                'name_of' => 'Toys & Games',
                'icon' => 'icon-toys.png',
                'img_path' => '6.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'BEAU',
                'name_of' => 'Beauty & Health',
                'icon' => 'icon-beauty.png',
                'img_path' => '1.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'AUTO',
                'name_of' => 'Automotive',
                'icon' => 'icon-automotive.png',
                'img_path' => '2.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'PET',
                'name_of' => 'Pet Supplies',
                'icon' => 'icon-pet.png',
                'img_path' => '3.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'GROC',
                'name_of' => 'Groceries',
                'icon' => 'icon-groceries.png',
                'img_path' => '4.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'GAMES',
                'name_of' => 'Games',
                'icon' => 'icon-groceries.png',
                'img_path' => '4.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'PHONE',
                'name_of' => 'Phones',
                'icon' => 'icon-phone.png',
                'img_path' => '4.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'LAPTOP',
                'name_of' => 'Laptops',
                'icon' => 'icon-laptop.png',
                'img_path' => '4.jpg',
                'is_active' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
