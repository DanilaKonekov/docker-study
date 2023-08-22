<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCard extends Model
{
    protected $fillable = ['name', 'article_number', 'retail_price'];

    public function sourceItems()
    {
        return $this->belongsToMany(SourceItem::class, 'concurrency')
            ->withPivot('wholesale_price', 'retail_price')
            ->withTimestamps();
    }
}
