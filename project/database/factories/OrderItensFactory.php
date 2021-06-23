<?php

namespace Database\Factories;

use App\Models\OrderItens;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderItensFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItens::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'product_id' => 1,
           'order_id' => 1,
           'quantity' => $this->faker->numberBetween(1,5),
            'unit_price' => $this->faker->randomNumber(3)
        ];
    }
}
