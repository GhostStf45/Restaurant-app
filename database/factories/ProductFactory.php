<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'category_id' => $faker->numberBetween(1,3),
        'description' => $faker->sentence(20),
        'price' => $faker->numberBetween(5, 60),
    ];
});
