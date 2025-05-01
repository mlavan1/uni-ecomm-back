<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Nike', 'Adidas', 'Puma', 'Apple', 'Samsung', 'Sony', 'LG', 'Dell', 'HP', 'Asus'];
        foreach ($brands as $brand) {
            Brand::create(['name' => $brand]);
        }
    }
}
