<?php

namespace App\Console\Commands;

use App\Models\Concurrency;
use Illuminate\Console\Command;
use App\Models\ProductCard;
use App\Models\SourceItem;

class ProductCardListCommand extends Command
{
    protected $signature = 'product-card:list';

    protected $description = 'Display a list of product cards with prices';

    public function handle(): int
    {
        $productCards = ProductCard::with('sourceItems')->get();

        /** @var ProductCard $productCard */
        foreach ($productCards as $productCard) {


            $result = $productCard->calculatePrice();

            $this->info("Product Card: {$productCard->name} (Article: {$productCard->article_number}) Price opt: {$result['opt_price']} Price ret: {$result['retail_price']}" );

            $this->line('');
        }

        return self::SUCCESS;
    }
}
