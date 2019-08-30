<?php

use Faker\Generator as Faker;

$factory->define(App\ProductImage::class, function (Faker $faker) {
    $folders = [
        'computers',
        'computers2',
        'computers3',
        'monitors',
        'phone',
        'rams',
        'routers',
        'tablets',
        'zapatos',
        'zapatos2',
        'zapatos3',
    ];

    $path = public_path() . '/storage/products';
    // dd($path);
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }

    $product = $faker->randomElement($folders);

    $path = str_replace('public/storage/', '', $faker->file($fuente = 'resources/images/' . $product, $destino = 'public/storage/products'));

    return [
        'product_id' => null,
        'path'      => $path,
    ];
});
