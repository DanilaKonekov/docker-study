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
        SourceItem::factory(10)->create();
    }
}
