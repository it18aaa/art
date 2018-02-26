<?php

use Faker\Generator as Faker;

$factory->define(App\Artwork::class, function (Faker $faker) {
       
    return [
        //
        'name' => $faker->word,      
        'price' => $faker->randomNumber(5),
        'onsale' => $faker->boolean,
        'pricepublic' => $faker->boolean,
        'artistid' => $faker->numberBetween(0,19)
    ];
});
