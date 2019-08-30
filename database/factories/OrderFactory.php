<?php

use Faker\Generator as Faker;
use App\State;
use App\City;
use App\Zone;

$factory->define(App\Order::class, function (Faker $faker) {

    $date = $faker->dateTimeInInterval($startDate = '-30 days', $interval = '30 days', $timezone = null);

    $state_id = State::inRandomOrder()->first()->id;
    $city_id = City::inRandomOrder()->first()->id;
    $zone_id = Zone::inRandomOrder()->first()->id;

    $user = App\User::role('client')->inRandomOrder()->first();

    return [
        'user_id'    => $user->id,
        'code'       => strtoupper(str_random(10)),
        'state_id'   => $state_id,
        'city_id'    => $city_id,
        'zone_id'    => $zone_id,
        'zip_code'   => $faker->numberBetween(100, 999),
        'street'     => $faker->streetAddress,
        'address'    => $faker->address,
        'status'     => $faker->randomElement(['successful', 'pending', 'failed']),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-5 month', $endDate = 'now'),
        'deleted_at' => $faker->randomElement([null, null, $date, $date, $date]),
    ];
});
