<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductCardType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProductCard',
        'description' => 'A product card',
    ];

    public function fields(): array
    {
        return [
            'id' => ['type' => Type::nonNull(Type::int())],
            'name' => ['type' => Type::string()],
            'article' => ['type' => Type::string()],
            'retail_price' => ['type' => Type::float()],
            'source_items' => ['type' => Type::listOf(GraphQL::type('SourceItem'))],
        ];
    }
}
