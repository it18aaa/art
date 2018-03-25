<?php

use Faker\Generator as Faker;

$factory->define(App\Artist::class, function (Faker $faker) {
    return [
        //
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'bio' => $faker->realText
    ];
});
