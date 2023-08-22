<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

return new class extends Model
{
    protected $fillable = ['name', 'opt_price', 'retail_price', 'article_number', 'product_card_id'];

    public function productCard()
    {
        return $this->belongsTo(ProductCard::class);
    }
};
