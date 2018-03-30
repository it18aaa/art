<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'title' => $faker->title,
        'email' => $faker->email,
        'postcode' => $faker->postcode,
        'telephone' => $faker->phoneNumber,
        'address1' => $faker->buildingNumber . " " . $faker->streetName,
        'county' => $faker->county,
        'town' => $faker->city,
    ];
});
