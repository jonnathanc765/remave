<?php

use Cmgmyr\Messenger\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'thread_id' => null,
        'user_id'   => App\User::inRandomOrder()->first(),
        'body'      => $faker->text($maxNbChars = 200),
    ];
});
