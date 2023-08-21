<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCard extends Model
{
    protected $fillable = ['name', 'article', 'retail_price'];

    public function sourceItems()
    {
        return $this->hasMany(SourceItem::class);
    }
}
