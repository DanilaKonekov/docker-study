<?php

namespace App\Console\Commands;

use App\Models\ProductCard;
use App\Models\SourceItem;
use Illuminate\Console\Command;

class GeneratePriceMappingTable extends Command
{
    protected $signature = 'price:mapping';

    protected $description = 'Generate price mapping table';

    public function handle()
    {
        $productCards = ProductCard::all();

        foreach ($productCards as $card) {
            $sourceItems = SourceItem::where('article', $card->article)->get();

            $wholesalePrice = null;
            $retailPrice = null;

            foreach ($sourceItems as $item) {
                if ($wholesalePrice === null || $item->wholesale_price < $wholesalePrice) {
                    $wholesalePrice = $item->wholesale_price;
                    $retailPrice = $item->retail_price;
                }
            }

            $card->update([
                'retail_price' => $retailPrice,
            ]);
        }

        $this->info('Price mapping table generated successfully.');
    }
}
