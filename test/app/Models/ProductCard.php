<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCard extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'article', 'retail_price'];

    public function sourceItems()
    {
        return $this->hasMany(SourceItem::class);
    }
};
