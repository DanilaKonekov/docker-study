<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SourceItem;

class SourceItemsTableSeeder extends Seeder
{
    public function run()
    {
        SourceItem::create([
            'name' => 'Source 1',
            'opt_price' => 5.99,
            'retail_price' => 14.99,
            'article_number' => 'ABCDE',
        ]);

        SourceItem::create([
            'name' => 'Source 2',
            'opt_price' => 7.99,
            'retail_price' => 17.99,
            'article_number' => 'FGHIJ',
        ]);
    }
}
