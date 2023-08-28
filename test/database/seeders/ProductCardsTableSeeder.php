<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCard;

class ProductCardsTableSeeder extends Seeder
{
    public function run()
    {
        // Создание карточек товаров
        ProductCard::create([
            'name' => 'Товар 1',
            'article_number' => '123456',
            'retail_price' => 5.99,
        ]);

        ProductCard::create([
            'name' => 'Товар 2',
            'article_number' => '789012',
            'retail_price' => 19.99,
        ]);
        ProductCard::create([
            'name' => 'Товар 3',
            'article_number' => '345678',
            'retail_price' => null,
        ]);

        ProductCard::create([
            'name' => 'Товар 4',
            'article_number' => '901234',
            'retail_price' => 29.99,
        ]);
    }
}
