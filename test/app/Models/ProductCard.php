<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

return new class extends Model
{
    protected $fillable = ['name', 'article_number', 'retail_price'];

    public function sourceItems()
    {
        return $this->hasMany(SourceItem::class, 'product_card_id');
    }
};
