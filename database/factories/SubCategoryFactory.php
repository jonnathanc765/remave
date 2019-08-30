<?php

use Faker\Generator as Faker;

$factory->define(App\SubCategory::class, function (Faker $faker) {
    return [
        'category_id' => rand(1, 10),
        'name'        => $faker->word,
        'description' => $faker->sentence(5),
    ];
});
