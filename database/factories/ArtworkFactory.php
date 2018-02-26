<?php

use Faker\Generator as Faker;

$factory->define(App\Artwork::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->word,      
        'image' => 0,
        'price' => $faker->randomNumber(5),
        'onsale' => $faker->boolean,
        'pricepublic' => $faker->boolean 

    ];
});
