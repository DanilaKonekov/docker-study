<?php

namespace Database\Factories;

use App\Models\SourceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class SourceItemFactory extends Factory
{
    /**
     * Определение модели, которую фабрика должна использовать.
     *
     * @var string
     */
    protected $model = SourceItem::class;

    /**
     * Определение значений по умолчанию для атрибутов модели.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'wholesale_price' => null,
            'retail_price' => null,
            'article' => $this->faker->unique()->ean13,
        ];
    }
}
