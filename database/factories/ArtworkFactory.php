<?php

use Faker\Generator as Faker;

$factory->define(App\Artwork::class, function (Faker $faker) {
       
    return [
        //
        'name' => $faker->word . " " . $faker->word,      
        'price' => $faker->numberBetween(50,10000),
        'sold' => $faker->boolean,
        'pricepublic' => $faker->boolean,
        'artist_id' => $faker->numberBetween(1,19)
    ];
});
