<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceItem extends Model
{
    protected $fillable = ['name', 'article_number', 'opt_price', 'retail_price'];

    public function productCards()
    {
        return $this->belongsToMany(ProductCard::class, 'concurrency')
            ->withPivot('opt_price', 'retail_price')
            ->withTimestamps();
    }
}
