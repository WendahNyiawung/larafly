<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flight;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(Flight::all()) > 0){
            return;
        }
        $faker = \Faker\Factory::create();

        for($i=0; $i<100; $i++){
            $flight = new Flight();
            $flight->origin = $faker->text(20);
            $flight->destination = $faker->text(20);
            $flight->departure_time = $faker->time();
            $flight->arrival_time = $faker->time();
            $flight->price = "200.0";
            $flight->status = $faker->randomElement(['pending', 'departed', 'arrived']);
            $flight->company_id = \App\Models\Company::inRandomOrder()->first()->id;
            $flight->user_id = \App\Models\User::inRandomOrder()->first()->id;
            $flight->save();
        }
    }
}