<?php
return [
    'schemas' => [
        'default' => [
            'query' => [
                App\GraphQL\Queries\ProductCardQuery::class,
            ],
            'mutation' => [],
            'middleware' => [],
            'method' => ['get', 'post'],
        ],
    ],

    'types' => [
        App\GraphQL\Types\ProductCardType::class,
    ],
];
