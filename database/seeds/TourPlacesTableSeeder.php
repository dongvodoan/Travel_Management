<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class TourPlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 10; $i++){
        	DB::Table('tour_places')->insert([
        		'tours_id'          => rand(1,10),
        		'places_id'         => rand(1,10),
        	]);
        }
    }
}
