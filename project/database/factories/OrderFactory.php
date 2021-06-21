<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "date"=> $this->faker->date(),
            "people_id"=>1,
            "status_id"=> $this->faker->numberBetween(1,3),
            "discount"=> $this->faker->numberBetween(0, 10),
            "order_itens"=> [
                [
                    "product_id"=> 1,
                    "quantity"=> $this->faker->numberBetween(0, 10),
                    "unit_price"=>$this->faker->numberBetween(0, 5)
                ],
                [
                    "product_id"=> 2,
                    "quantity"=> $this->faker->numberBetween(0, 10),
                    "unit_price"=>$this->faker->numberBetween(0, 5)
                ]
            ]
        ];
    }
}
