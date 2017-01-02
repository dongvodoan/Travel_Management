<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class ToursTableSeeder extends Seeder
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
        	DB::Table('tours')->insert([
        		'title'             => $faker-> word,
        		'describe'          => $faker-> paragraph,
        		'times_id'          => rand(1,5),
        		'prices_id'         => rand(1,10),
        		'itineraries_id'    => rand(1,10),
        		'category_tours_id' => rand(1,10),
        		'created_at'        => Carbon\Carbon::now()
        	]);
        }
    }
}
