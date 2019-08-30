<?php

use App\SubCategory;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {

    $subcategory = SubCategory::inRandomOrder()->first();

    $size_types = [
        'GB',
        'Talla',
        'M US',
    ];

    $colors = [
        'Rojo',
        'Azul',
        'Blanco',
        'Negro',
        'Morado',
        'Negro'
    ];

    return [
        'sub_category_id' => $subcategory->id,
        'post_id'         => null,
        'code'            => $faker->bothify('#?#?#??##?#?'),
        'name'            => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'description'     => $faker->sentence($nbWords = 6, $variableNbWords = true),
         //'stock'        => $faker->numberBetween(1, 10),
        'size'            => $faker->numberBetween(1, 264),
        'size_type'       => $faker->randomElement($size_types),
        'off'             => $faker->numberBetween(0,70),
        'color'           => $faker->randomElement($colors),
        'price'           => $faker->numberBetween(20, 300),
    ];
});
