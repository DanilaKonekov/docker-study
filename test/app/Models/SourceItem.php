<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SourceItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'wholesale_price', 'retail_price', 'article'];

    public function productCard()
    {
        return $this->belongsTo(ProductCard::class);
    }
}
