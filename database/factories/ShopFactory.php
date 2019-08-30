<?php

use Faker\Generator as Faker;

$factory->define(App\Shop::class, function (Faker $faker) {
    $carpeta = 'logos';

    $path = public_path() . '/storage/' . $carpeta;
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }

    $fuente  = 'resources/images/' . $carpeta;
    $destino = 'public/storage/' . $carpeta;

    $image = str_replace('public/storage/', '', $faker->file($fuente, $destino));

    return [
        'user_id'         => null,
        'name'            => $faker->word,
        'logo'            => $image,
        'minimum_ammount' => $faker->randomNumber($nbDigits = null, $strict = false),
        'address'         => $faker->address,
        'phone'           => $faker->phoneNumber,
    ];
});
