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
            'article_number' => '123456',
            'product_card_id' => 1,
        ]);

        SourceItem::create([
            'name' => 'Элемент 2',
            'opt_price' => 15.99,
            'retail_price' => 19.99,
            'article_number' => '789012',
            'product_card_id' => 2,
        ]);
    }
}
