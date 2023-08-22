<?php

namespace App\Console\Commands;

use App\Models\ProductCard;
use Illuminate\Console\Command;

class ListProductCards extends Command
{
    protected $signature = 'product-cards:list';

    protected $description = 'Display a list of product cards';

    public function handle()
    {
        $productCards = ProductCard::all();

        if ($productCards->isEmpty()) {
            $this->info('No product cards found.');
            return;
        }

        $headers = ['Title', 'Article', 'Wholesale Price', 'Retail Price'];
        $rows = [];

        foreach ($productCards as $productCard) {
            $wholesalePrice = $productCard->sourceItem ? $productCard->sourceItem->wholesale_price : null;
            $rows[] = [
                $productCard->title,
                $productCard->article,
                $wholesalePrice,
                $productCard->retail_price,
            ];
        }

        $this->table($headers, $rows);
    }
}
