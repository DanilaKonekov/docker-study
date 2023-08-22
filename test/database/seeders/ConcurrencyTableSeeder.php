<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Concurrency;

class ConcurrencyTableSeeder extends Seeder
{
    public function run()
    {
        // Создание записей конкурентности
        Concurrency::create([
            'product_card_id' => 1,
            'concurrent_product_card_id' => 2,
            'competitor_name' => 'Конкурент 1',
            'price_difference' => 5.00,
        ]);

        // Добавьте другие записи по необходимости
    }
}
