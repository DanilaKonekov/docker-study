<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCard;

class ProductCardSeeder extends Seeder
{
    public function run()
    {
        // Create sample product cards
        $productCards = [
            [
                'name' => 'Product 1',
                'article_number' => '123',
                'retail_price' => 9.99,
            ],
            [
                'name' => 'Product 2',
                'article_number' => '456',
                'retail_price' => 19.99,
            ],
            // Add more product cards as needed
        ];

        // Insert the data into the database
        ProductCard::insert($productCards);
    }
}
