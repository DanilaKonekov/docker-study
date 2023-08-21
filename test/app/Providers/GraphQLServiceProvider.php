<?php

use App\GraphQL\Queries\ProductCardQuery;
use App\GraphQL\Types\ProductCardType;
use Nuwave\Lighthouse\Schema\TypeRegistry;

class GraphQLServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(ProductCardQuery::class, function () {
            return new ProductCardQuery();
        });

        $typeRegistry = app(TypeRegistry::class);
        $typeRegistry->register(new ProductCardType());
    }
}
