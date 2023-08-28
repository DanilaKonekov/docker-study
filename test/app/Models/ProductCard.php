<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\ProductCard
 *
 * @property int $id
 * @property string $name
 * @property string $article_number
 * @property string|null $retail_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SourceItem> $sourceItems
 * @property-read int|null $source_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCard whereArticleNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCard whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCard whereRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCard whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductCard extends Model
{
    protected $table = 'product_cards';

    protected $fillable = ['name', 'article_number', 'retail_price'];

    public function sourceItems(): BelongsToMany
    {
        return $this->belongsToMany(SourceItem::class, 'concurrency');
    }

    public function calculatePrice(): array
    {
        $priceOpt = null;
        $priceRet = null;

        foreach ($this->sourceItems as $sourceItem) {
            $optPrice = $sourceItem->opt_price;
            $retailPrice = $sourceItem->retail_price;

            if ($priceOpt === null) {
                $priceOpt = $optPrice;
                $priceRet = $retailPrice;
            } else if ($optPrice < $priceOpt) {
                $priceOpt = $optPrice;
                $priceRet = $retailPrice;
            }
        }

        return [
            'opt_price' => $priceOpt,
            'retail_price' => $priceRet,
        ];
    }

}
