<?php

namespace App\Console\Commands;

use App\Models\ProductCard;
use Illuminate\Console\Command;

return new class extends Command
{
    protected $signature = 'product-cards:list';
    protected $description = 'List all product cards';

    public function handle()
    {
        $headers = ['Name', 'Article Number', 'Wholesale Price', 'Retail Price'];

        $productCards = ProductCard::with('sourceItems')->get();

        $data = [];

        foreach ($productCards as $productCard) {
            $wholesalePrice = null;
            $retailPrice = null;

            foreach ($productCard->sourceItems as $sourceItem) {
                if (is_null($wholesalePrice) || $sourceItem->opt_price < $wholesalePrice) {
                    $wholesalePrice = $sourceItem->opt_price;
                    $retailPrice = $sourceItem->retail_price;
                }
            }

            $data[] = [
                'Name' => $productCard->name,
                'Article Number' => $productCard->article_number,
                'Wholesale Price' => $wholesalePrice,
                'Retail Price' => $retailPrice,
            ];
        }

        $this->table($headers, $data);
    }
};
