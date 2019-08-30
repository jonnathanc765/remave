<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first(),
        'post_id' => null,
        'comment' => $faker->text($maxNbChars = 200),
        'answer'  => $faker->randomElement([$faker->sentence, null]),
    ];
});
