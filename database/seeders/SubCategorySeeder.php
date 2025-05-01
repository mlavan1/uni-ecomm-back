<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // First, get major category IDs
        $majorCategories = DB::table('major_categories')->pluck('id', 'code');

        // Define subcategories for each major category
        $subCategories = [
            'ELEC' => ['Mobile Phones', 'Laptops', 'Televisions', 'Cameras'],
            'FASH' => ['Men\'s Wear', 'Women\'s Wear', 'Watches', 'Footwear'],
            'HOME' => ['Furniture', 'Kitchen', 'Decor', 'Lighting'],
            'SPORT' => ['Fitness Equipment', 'Outdoor Gear', 'Sportswear'],
            'BOOK' => ['Fiction', 'Non-fiction', 'Comics', 'Textbooks'],
            'TOYS' => ['Educational Toys', 'Board Games', 'Outdoor Toys'],
            'BEAU' => ['Skincare', 'Haircare', 'Makeup', 'Personal Care'],
            'AUTO' => ['Car Accessories', 'Motorbike Gear', 'Car Electronics'],
            'PET' => ['Pet Food', 'Pet Toys', 'Pet Grooming'],
            'GROC' => ['Beverages', 'Snacks', 'Dairy', 'Bakery'],
        ];

        // Build subcategory records
        $data = [];
        foreach ($subCategories as $majorCode => $subs) {
            foreach ($subs as $index => $subName) {
                $data[] = [
                    'mainCategory_id' => $majorCategories[$majorCode] ?? null,
                    'code' => strtoupper(substr($subName, 0, 4)) . rand(100, 999),
                    'name_of' => $subName,
                    'icon' => 'icon-' . strtolower(str_replace(' ', '-', $subName)) . '.png',
                    'img_path' => 'images/subcategories/' . strtolower(str_replace(' ', '-', $subName)) . '.jpg',
                    'is_active' => 'Y',
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        // Insert into table
        DB::table('sub_categories')->insert($data);
    }
}
