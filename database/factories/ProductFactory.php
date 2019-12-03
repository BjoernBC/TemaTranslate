<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku' => $faker->unique()->randomNumber($nbDigits = 6),
        'is_priority' => $faker->boolean(),
        'translation_level' => $faker->numberBetween($min = 1, $max = 3),
    ];
});
