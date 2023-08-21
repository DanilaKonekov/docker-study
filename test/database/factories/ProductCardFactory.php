<?php
namespace Database\Factories;

use App\Models\ProductCard;
use App\Models\SourceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCardFactory extends Factory
{
    protected $model = ProductCard::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'article' => $this->faker->unique()->ean13,
            'retail_price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (ProductCard $productCard) {
            SourceItem::factory()->create([
                'name' => $productCard->name,
                'article' => $productCard->article,
                'wholesale_price' => null,
                'retail_price' => $productCard->retail_price,
                'id' => $productCard->id,
            ]);
        });
    }
}
