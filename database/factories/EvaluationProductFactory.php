<?php

use Faker\Generator as Faker;

$factory->define(App\EvaluationProduct::class, function (Faker $faker){
    return [
        'user_id' => App\User::role('client')->inRandomOrder()->first(),
       	'shop_id' => App\User::role('provider')->inRandomOrder()->first(),
       	'product_quality' => rand(1, 5),
       	'response_time' => rand(1, 5),
       	];
});
 