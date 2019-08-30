<?php

use Faker\Generator as Faker;

$factory->define(App\Faq::class, function (Faker $faker) {
    return [
        'question' => '¿'.$faker->sentence.'?',
        'answer' => $faker->paragraph,
    ];
});
