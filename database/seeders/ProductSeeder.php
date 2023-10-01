<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public const PRODUCTS_AMOUNT = 50;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(self::PRODUCTS_AMOUNT)->create();
    }
}
