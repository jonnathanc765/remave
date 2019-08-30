<?php

use Cmgmyr\Messenger\Models\Participant;
use Faker\Generator as Faker;

$factory->define(Participant::class, function (Faker $faker) {
    return [
        'thread_id' => null,
        'user_id'   => App\User::inRandomOrder()->first(),
    ];
});
