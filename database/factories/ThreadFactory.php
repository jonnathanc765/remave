<?php

use Faker\Generator as Faker;
use Cmgmyr\Messenger\Models\Thread;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        'subject' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
