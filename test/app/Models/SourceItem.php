<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceItem extends Model
{
    protected $fillable = ['name', 'article', 'wholesale_price', 'retail_price'];

    public function productCards()
    {
        return $this->belongsToMany(ProductCard::class, 'concurrency')
            ->withPivot('wholesale_price', 'retail_price')
            ->withTimestamps();
    }
}
