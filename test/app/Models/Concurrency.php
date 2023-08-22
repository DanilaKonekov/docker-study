<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concurrency extends Model
{
    protected $fillable = [
        'product_card_id',
        'concurrent_product_card_id',
        'competitor_name',
        'price_difference'
    ];
}
