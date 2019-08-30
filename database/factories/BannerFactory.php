<?php

use Faker\Generator as Faker;

$factory->define(App\Banner::class, function (Faker $faker) {

    $carpeta = 'banners';

    $path = public_path() . '/storage/' . $carpeta;
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }

    $fuente  = 'resources/images/' . $carpeta;
    $destino = 'public/storage/' . $carpeta;

    $image = str_replace('public/storage/', '', $faker->file($fuente, $destino));
    $image = str_replace('\\', '/', $image);

    return [
        'shop_id'  => null,
        'name'     => $faker->sentence(3),
        'path'     => $image,
        'position' => $faker->numberBetween(0, 5),
    ];
});
