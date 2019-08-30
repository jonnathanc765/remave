<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'shop_id'     => null,
        'description' => $faker->paragraph(20),
        'published'   => $faker->randomelement([true, true, false]),
    ];
});
