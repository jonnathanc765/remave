<?php

use Faker\Generator as Faker;

$factory->define(App\WishList::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first(),
       	'product_id' => App\Product::inRandomOrder()->first(),
    ];
});
