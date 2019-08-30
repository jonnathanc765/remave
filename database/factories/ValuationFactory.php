<?php

use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Valuation::class, function (Faker $faker) {
    return [
        'user_id'    => User::role('client')->inRandomOrder()->first()->id,
        'payee_id'   => User::role('provider')->inRandomOrder()->first()->id,
        'product_id' => Product::inRandomOrder()->first()->id,
        'comment'    => $faker->sentence(6),
        'rating'     => $faker->numberBetween(1, 5),
    ];
});
