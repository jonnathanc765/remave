<?php

use Faker\Generator as Faker;

$factory->define(App\EvaluationProvider::class, function (Faker $faker) {
        return [
        'user_id' => App\User::role('client')->inRandomOrder()->first(),
       	'provider_id' => App\User::role('provider')->inRandomOrder()->first(),
       	'quality_product' => rand(1, 5),
       	'response_time' =>  rand(1, 5),


    ];
});

