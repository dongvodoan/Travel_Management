<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class ItinerariesTableSeeder extends Seeder
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
        	DB::Table('itineraries')->insert([
        		'title'           => $faker-> word,
        		'content'         => $faker-> paragraph,
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
    }
}
