<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SourceItem
 *
 * @property int $id
 * @property string $name
 * @property string $opt_price
 * @property string|null $retail_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductCard> $productCards
 * @property-read int|null $product_cards_count
 * @method static \Illuminate\Database\Eloquent\Builder|SourceItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SourceItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SourceItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|SourceItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SourceItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SourceItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SourceItem whereOptPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SourceItem whereRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SourceItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SourceItem extends Model
{
    protected $table = 'source_items';

    protected $fillable = ['name', 'article_number', 'opt_price', 'retail_price'];

    public function productCards()
    {
        return $this->belongsToMany(ProductCard::class, 'concurrency');
    }
}
