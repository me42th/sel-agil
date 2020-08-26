<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Agility;
use Faker\Generator as Faker;

$factory->define(Agility::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'costumer' => $faker->word,
        'status' => $faker->randomDigitNotNull,
        'remember_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
