<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Concurrency
 *
 * @property int $id
 * @property int $product_card_id
 * @property int $source_item_id
 * @method static \Illuminate\Database\Eloquent\Builder|Concurrency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Concurrency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Concurrency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Concurrency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Concurrency whereProductCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Concurrency whereSourceItemId($value)
 * @mixin \Eloquent
 */
class Concurrency extends Model
{
    protected $table = 'concurrency';

    public $timestamps = false;

    protected $fillable = [
        'product_card_id',
        'concurrent_product_card_id',
        'competitor_name',
        'price_difference'
    ];
}
