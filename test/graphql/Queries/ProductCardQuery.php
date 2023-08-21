<?php

namespace App\GraphQL\Queries;

use Closure;
use App\Models\ProductCard;

class ProductCardQuery
{
    public function productCards($rootValue, array $args)
    {
        return ProductCard::all();
    }
}
