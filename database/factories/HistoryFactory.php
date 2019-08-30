<?php

use Faker\Generator as Faker;

$factory->define(App\History::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first(),
        'role' => $faker->randomElement([1,2,3]),
        'module' => $faker->randomelement(['Clientes', 'Proveedores', 'Banner', 'Post', 'Configuración', 'Producto']),
        'action' => $faker->randomelement(['Se ha registrado en el sistema', 'ha creado eliminado un producto', 'Ha agregado o modificado un banner', 'Ha pulicado un nuevo producto', 'Ha hecho una configuracion en los meta', 'Ha modificado un producto']),
        'ip' => $faker->ipv4 ,
        'url' => $faker->url,
        'browser' => $faker->userAgent,

    ];
});
