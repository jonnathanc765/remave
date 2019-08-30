<?php

use Faker\Generator as Faker;

$factory->define(App\UserDetail::class, function (Faker $faker) {
    return [
        'user_id'  => null,
        'phone'    => $faker->phoneNumber,
        'state_id' => App\State::inRandomOrder()->first()->id,
        'city_id'  => App\City::inRandomOrder()->first()->id,
        'zone_id'  => App\Zone::inRandomOrder()->first()->id,
        'zip_code' => $faker->numberBetween(100, 999),
        'street'   => $faker->streetAddress,
        'address'  => $faker->address,
    ];
});
