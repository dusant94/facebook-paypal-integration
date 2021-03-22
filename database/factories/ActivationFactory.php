<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activation;
use Faker\Generator as Faker;

$factory->define(Activation::class, function (Faker $faker) {
    return [
        'code' => Str::random(32),
        'completed' => '1',
        'completed_at'=> now(),
    ];
});
