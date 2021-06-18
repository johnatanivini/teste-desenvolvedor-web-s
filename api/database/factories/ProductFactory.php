<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'unit_price' => $faker->randomFloat(3,0,1),
        'description' => $faker->text,
        'barcode'=> $faker->ean13,
        'expiration'=>$faker->dateTimeInInterval(),
        'quantity'=> $faker->randomNumber(2)
    ];
});
