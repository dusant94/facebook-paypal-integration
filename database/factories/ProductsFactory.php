<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'name' => Str::random(7),
        'price'=>rand(100,20000)/100,
        'product_image'=>$faker->imageUrl('900','300'),
          //
    ];
});
