<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scale;

class ScaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scales = ['Small', 'Medium', 'Large', 'XL', 'XXL'];
        foreach ($scales as $scale) {
            Scale::create(['name' => $scale]);
        }
    }
}
