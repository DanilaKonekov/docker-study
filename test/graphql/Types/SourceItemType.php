<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SourceItemType extends GraphQLType
{
    protected $attributes = [
        'name' => 'SourceItem',
        'description' => 'An item from a source',
    ];

    public function fields(): array
    {
        return [
            'id' => ['type' => Type::nonNull(Type::int())],
            'name' => ['type' => Type::string()],
            'wholesale_price' => ['type' => Type::float()],
            'retail_price' => ['type' => Type::float()],
            'article' => ['type' => Type::string()],
            'product_card' => ['type' => GraphQL::type('ProductCard')],
        ];
    }
}
