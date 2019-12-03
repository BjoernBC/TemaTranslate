<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductTranslation;
use Faker\Generator as Faker;

$factory->define(ProductTranslation::class, function (Faker $faker) {
    return [
        'title' => Str::random(10),
        'description' => $faker->realText($maxNbChars = 200),
        'description_list' => Str::random(10),
        'package_contains' => Str::random(10),
    ];
});
