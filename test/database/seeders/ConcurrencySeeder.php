<?php

namespace Database\Seeders;

use App\Models\Concurrency;
use Illuminate\Database\Seeder;
use App\Models\ProductCard;
use App\Models\SourceItem;

class ConcurrencySeeder extends Seeder
{
    public function run()
    {

        Concurrency::create([
           'product_card_id' => 1,
           'source_item_id' => 1,
        ]);

        Concurrency::create([
            'product_card_id' => 1,
            'source_item_id' => 2,
        ]);

        Concurrency::create([
            'product_card_id' => 1,
            'source_item_id' => 3,
        ]);

//        $productCards = ProductCard::all();
//        $sourceItems = SourceItem::all();
//
//        foreach ($productCards as $productCard) {
//            foreach ($sourceItems as $sourceItem) {
//                $existingPivot = $productCard->sourceItems()->where('source_item_id', $sourceItem->id)->first();
//
//                if (!$existingPivot) {
//                    // Если цена товара null, то устанавливаем эту цену опт и розницы карточке товара.
//                    // Если у карточки товара есть фиксированная цена, устанавливаем ее как розничную цену.
//                    // Иначе оставляем цены прайслиста без изменений.
//                    $wholesalePrice = $sourceItem->opt_price;
//                    $retailPrice = $sourceItem->retail_price;
//                    if ($productCard->retail_price !== null) {
//                        $retailPrice = $productCard->retail_price;
//                    } else {
//                        $retailPrice = 0.00;
//                    }
//
//                    $productCard->sourceItems()->attach($sourceItem, [
//                        'wholesale_price' => $wholesalePrice,
//                        'retail_price' => $retailPrice,
//                    ]);
//                }
//            }
//        }
    }
}
