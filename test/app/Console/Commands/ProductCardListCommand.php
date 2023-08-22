<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductCard;
use App\Models\SourceItem;

class ProductCardListCommand extends Command
{
    protected $signature = 'product-card:list';

    protected $description = 'Display a list of product cards with prices';

    public function handle()
    {
        $productCards = ProductCard::with('sourceItems')->get();

        foreach ($productCards as $productCard) {
            $this->info("Product Card: {$productCard->name} (Article: {$productCard->article_number})");
            $this->line('----------------------------------');
            $this->line('Source Items:');

            foreach ($productCard->sourceItems as $sourceItem) {
                $wholesalePrice = $sourceItem->pivot->wholesale_price;
                $retailPrice = $sourceItem->pivot->retail_price;

                $this->line(" - Name: {$sourceItem->name}");
                $this->line("   Article: {$sourceItem->article_number}");
                $this->line("   Wholesale Price: {$wholesalePrice}");
                $this->line("   Retail Price: {$retailPrice}");
                $this->line('----------------------------------');
            }

            $this->line('');
        }
    }
}
