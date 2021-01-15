<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Peakflow;
use Faker\Generator as Faker;

$factory->define(Peakflow::class, function (Faker $faker) use ($factory) {
    return [
        'user_id' => $factory->create(App\User::class)->id,
        'date' => $faker->date,
        'time' => $faker->time,
        'measurement_one' => $faker->numberBetween(100, 900),
        'measurement_two' => $faker->numberBetween(100, 900),
        'measurement_three' => $faker->numberBetween(100, 900),
        'taken_medicines' => $faker->boolean,
        'explanation' => $faker->sentence,
    ];
});
