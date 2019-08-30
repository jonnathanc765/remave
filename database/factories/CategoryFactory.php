<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {

    $carpeta = 'categories';

    $path = public_path() . '/storage/' . $carpeta;
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }

    $fuente  = 'resources/images/' . $carpeta;
    $destino = 'public/storage/' . $carpeta;

    $image = str_replace('public/storage/', '', $faker->file($fuente, $destino));

    return [
        'name'        => ucwords($faker->unique()->word),
        'published'   => $faker->randomElement([true, false]),
        'description' => $faker->sentence(6),
        'image'       => $image,
    ];
});
