<?php

namespace App\GraphQL\Types;

use App\Models\ProductCard;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductCardType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProductCard',
        'description' => 'A product card',
        'model' => ProductCard::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The ID of the product card',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the product card',
            ],
            'article' => [
                'type' => Type::string(),
                'description' => 'The article of the product card',
            ],
            'retail_price' => [
                'type' => Type::float(),
                'description' => 'The retail price of the product card',
            ],
            'wholesale_price' => [
                'type' => Type::float(),
                'description' => 'The wholesale price of the product card',
            ],
        ];
    }
}
