<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=> $this->faker->title,
            "quantity"=> $this->faker->numberBetween(1,6),
            "unit_price"=> $this->faker->numberBetween(1,6),
            "barcode"=> $this->faker->regexify('[0-9]{13}'),
            "description"=> $this->faker->text(100),
            "expiration"=> $this->faker->date()
        ];
    }
}
