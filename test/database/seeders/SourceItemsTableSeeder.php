<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SourceItem;
use Illuminate\Database\Eloquent\Factories\Factory;
class SourceItemsTableSeeder extends Seeder
{
    public function run()
    {
        SourceItem::create([
            'name' => 'Элемент 1',
            'opt_price' => 5.99,
            'retail_price' => 4.99,
        ]);

        SourceItem::create([
            'name' => 'Элемент 2',
            'opt_price' => 15.99,
            'retail_price' => 19.99,
        ]);
        SourceItem::create([
            'name' => 'Элемент 3',
            'opt_price' => 10.99,
        ]);

        SourceItem::create([
            'name' => 'Элемент 4',
            'opt_price' => 25.99,
        ]);
    }
}
