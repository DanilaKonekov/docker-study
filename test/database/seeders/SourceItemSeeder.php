<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SourceItem;

class SourceItemSeeder extends Seeder
{
    public function run()
    {
        // Create sample source items
        $sourceItems = [
            [
                'name' => 'Source Item 1',
                'wholesale_price' => 5.99,
                'retail_price' => 9.99,
                'article_number' => '123',
                'product_card_id' => 1,
            ],
            [
                'name' => 'Source Item 2',
                'wholesale_price' => 10.99,
                'retail_price' => 19.99,
                'article_number' => '456',
                'product_card_id' => 2,
            ],
            // Add more source items as needed
        ];

        // Insert the data into the database
        SourceItem::insert($sourceItems);
    }
}
