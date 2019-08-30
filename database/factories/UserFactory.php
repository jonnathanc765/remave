<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|

 */

$factory->define(App\User::class, function (Faker $faker) {
    
    $date = $faker->dateTimeInInterval($startDate = '-30 days', $interval = '30 days', $timezone = null);

    /* Se crea el directorio para los avatars */
    $path = public_path() . '/storage/avatars';

    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
    $avatar = $faker->file($fuente = 'resources/images/avatars', $destino = 'public/storage/avatars');

    $avatar_final = str_replace('public/storage/', '', $avatar);
    // dd($avatar_final);

    return [
        'dni'               => $faker->randomNumber($nbDigits = 8, $strict = true), // 79907610
        'name'              => $faker->name, // John Smith
        'email'             => $faker->unique()->safeEmail, // example@domain.com
        'email_verified_at' => $faker->randomElement([null, null, $date, $date, $date]),
        'point'             => rand(1,5000),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'avatar'            => $avatar_final,
        'remember_token'    => str_random(10),
        'created_at'        => $faker->dateTimeInInterval($startDate = '-30 days', $interval = '30 days', $timezone = null),
        'updated_at'        => $faker->dateTimeInInterval($startDate = '-30 days', $interval = '30 days', $timezone = null),
        
    ];
});
