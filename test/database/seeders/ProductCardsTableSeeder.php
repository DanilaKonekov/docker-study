<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCard;

class ProductCardsTableSeeder extends Seeder
{
    public function run()
    {
        ProductCard::create([
            'name' => 'Product 1',
            'article_number' => '12345',
            'retail_price' => 9.99,
        ]);

        ProductCard::create([
            'name' => 'Product 2',
            'article_number' => '67890',
            'retail_price' => 19.99,
        ]);
    }
}
