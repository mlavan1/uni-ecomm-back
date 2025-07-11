<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Electronic Products
        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'code' => 'P00' . $i,
                'nameOf' => 'Sample Product ' . $i,
                'slug' => 'Sample-Product-' . $i,
                'description' => 'This is a description of Sample Product ' . $i,
                'imgPath' => 'product-' . $i . '.jpg',
                'isActive' => 'Y',
                'price' => rand(10, 200),
                'mainCategory_id' => 1,
                'subCategory_id' => 1,
                'scale_id' => rand(1, 5),
                'brand_id' => rand(1, 10),
                'sku' => 'SKU-' . $i,
                'discountRate' => 5,
                'discountAmount' => 5,
                'vatRate' => 10,
                'vatAmount' => 2,
                'qty' => rand(1, 50),
                'isNew' => ($i % 2 == 0) ? 'Y' : 'N',
            ]);
        }

        // Furniture Products
        for ($i = 21,$j=1; $i <= 40; $i++,$j++) {
            Product::create([
                'code' => 'P00' . $i,
                'nameOf' => 'Sample Product ' . $i,
                'slug' => 'Sample-Product-' . $i,
                'description' => 'This is a description of Sample Product ' . $i,
                'imgPath' => 'product-' . $j . '.jpg',
                'isActive' => 'Y',
                'price' => rand(10, 200),
                'mainCategory_id' => 3,
                'subCategory_id' => 9,
                'scale_id' => rand(1, 5),
                'brand_id' => rand(1, 10),
                'sku' => 'SKU-' . $i,
                'discountRate' => 5,
                'discountAmount' => 5,
                'vatRate' => 10,
                'vatAmount' => 2,
                'qty' => rand(1, 50),
                'isNew' => ($i % 2 == 0) ? 'Y' : 'N',
            ]);
        }

        // Clothing Products
        for ($i = 41,$j=1; $i <= 60; $i++,$j++) {
            Product::create([
                'code' => 'P00' . $i,
                'nameOf' => 'Sample Product ' . $i,
                'slug' => 'Sample-Product-' . $i,
                'description' => 'This is a description of Sample Product ' . $i,
                'imgPath' => 'product-' .  $j . '.jpg',
                'isActive' => 'Y',
                'price' => rand(10, 200),
                'mainCategory_id' => 2,
                'subCategory_id' => ($i <=50) ? 5 : 6,
                'scale_id' => rand(1, 5),
                'brand_id' => rand(1, 10),
                'sku' => 'SKU-' . $i,
                'discountRate' => 5,
                'discountAmount' => 5,
                'vatRate' => 10,
                'vatAmount' => 2,
                'qty' => rand(1, 50),
                'isNew' => ($i % 2 == 0) ? 'Y' : 'N',
            ]);
        }
    }
}
