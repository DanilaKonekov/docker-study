<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCard;

class ProductCardSeeder extends Seeder
{
    /**
     * Запуск сидера.
     *
     * @return void
     */
    public function run()
    {
        // Генерируем 10 карточек товаров
        \App\Models\ProductCard::factory()->count(10)->create();
    }
}
