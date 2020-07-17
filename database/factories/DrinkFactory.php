<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Drink;
use Faker\Generator as Faker;

$factory->define(Drink::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->sentence(2),
        'description' => $faker->sentence(20),
        'price' => $faker->numberBetween(1,10),
        'quantity' => $faker->numberBetween(0,4)
    ];
});
