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
        SourceItem::create([
            'name' => 'Элемент 3',
            'opt_price' => 10.99,
            'retail_price' => null,
            'article_number' => '345678',
            'product_card_id' => 1,
        ]);

        SourceItem::create([
            'name' => 'Элемент 4',
            'opt_price' => 25.99,
            'retail_price' => null,
            'article_number' => '901234',
            'product_card_id' => 2,
        ]);
    }
}
