<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ActionPlan;
use Faker\Generator as Faker;

$factory->define(ActionPlan::class, function (Faker $faker) use ($factory) {
    return [
        'user_id' => $factory->create(App\User::class)->id,
        'zone_green_peakflow_before_medicines' => $faker->numberBetween(100, 900),
        'zone_green_peakflow_after_medicines' => $faker->numberBetween(100, 900),
        'zone_green_explanation' => $faker->sentence,
        'zone_yellow_peakflow_below' => $faker->numberBetween(100, 900),
        'zone_yellow_peakflow_above' => $faker->numberBetween(100, 900),
        'zone_yellow_medicines' => 'Medicine 2',
        'zone_yellow_explanation' => $faker->sentence,
        'phonenumber_gp' => '0612345678',
        'phonenumber_lung_specialist' => '0612345678',
        'zone_red_peakflow' => $faker->numberBetween(100, 900),
        'zone_red_medicines' => 'Medicine 1',
        'zone_red_explanation' => $faker->sentence,
    ];
});
