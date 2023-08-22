<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCard;
use App\Models\SourceItem;

class ConcurrencySeeder extends Seeder
{
    public function run()
    {
        $productCards = ProductCard::all();
        $sourceItems = SourceItem::all();

        foreach ($productCards as $productCard) {
            foreach ($sourceItems as $sourceItem) {
                $existingPivot = $productCard->sourceItems()->where('source_item_id', $sourceItem->id)->first();

                if (!$existingPivot) {
                    // Если цена товара null, то устанавливаем эту цену опт и розницы карточке товара.
                    // Если у карточки товара есть фиксированная цена, устанавливаем ее как розничную цену.
                    // Иначе оставляем цены прайслиста без изменений.
                    $wholesalePrice = $sourceItem->opt_price;
                    $retailPrice = $sourceItem->retail_price;
                    if ($productCard->retail_price !== null) {
                        $retailPrice = $productCard->retail_price;
                    }

                    $productCard->sourceItems()->attach($sourceItem, [
                        'wholesale_price' => $wholesalePrice,
                        'retail_price' => $retailPrice,
                    ]);
                }
            }
        }
    }
}
