<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PeakflowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peakflows')->truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('peakflows')->insert([
                'date' => $faker->date,
                'time' => $faker->time, 
                'measurement_one' => $faker->numberBetween(100, 800), 
                'measurement_two' => $faker->numberBetween(100, 800),
                'measurement_three' => $faker->numberBetween(100, 800),
                'taken_medicines' => $faker->boolean, 
                'explanation' => $faker->sentence,
            ]);
        }
    }
}
