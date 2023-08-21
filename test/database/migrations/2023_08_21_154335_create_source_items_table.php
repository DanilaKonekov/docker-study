<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SourceItem extends Model
{
    protected $fillable = ['name', 'wholesale_price', 'retail_price', 'article'];

    public function productCard()
    {
        return $this->belongsTo(ProductCard::class);
    }
}
