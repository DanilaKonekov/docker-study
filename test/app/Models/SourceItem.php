<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceItem extends Model
{
    protected $fillable = ['name', 'opt_price', 'retail_price', 'article_number', 'product_card_id'];

    public function productCard()
    {
        return $this->belongsTo(ProductCard::class, 'article_number', 'article_number');
    }
};
