<?php

use Faker\Generator as Faker;

$factory->define(App\Notification::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first(),
        'message' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'action' => $faker->randomelement(['Se ha registrado en el sistema', 'ha creado eliminado un producto', 'Ha agregado o modificado un banner', 'Ha pulicado un nuevo producto', 'Ha hecho una configuracion en los meta', 'Ha modificado un producto']),
        'state' => $faker->randomElement([0, 1]),
        'status' => $faker->randomElement([0, 1]),
    ];
});
