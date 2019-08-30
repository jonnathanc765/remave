<?php

use Faker\Generator as Faker;

$factory->define(App\OrderDetail::class, function (Faker $faker) {
    $quantity = rand(1, 4);
    $product  = App\Product::inRandomOrder()->first();
    $total    = $product->price * $quantity;
    $taxe     = $total * 0.21;
    $date = $faker->dateTimeInInterval($startDate = '-30 days', $interval = '30 days', $timezone = null);

    return [
        'order_id'   => null,
        'product_id' => $product->id,
        'quantity'   => $quantity,
        'taxe'       => $taxe,
        'total'      => $total,
        'mp_notification_id'      => null,
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $faker->dateTimeInInterval($startDate = '-1 years', $interval = '30 days', $timezone = null),
        'deleted_at' => null,
    ];
});
