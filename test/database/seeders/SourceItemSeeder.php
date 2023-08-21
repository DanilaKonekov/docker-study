<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SourceItem;

class SourceItemSeeder extends Seeder
{
    /**
     * Запуск сидера.
     *
     * @return void
     */
    public function run()
    {
        // Генерируем 20 исходных элементов
        \App\Models\SourceItem::factory(20)->create();
    }
}
