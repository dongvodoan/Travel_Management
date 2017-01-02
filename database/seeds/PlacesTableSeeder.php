<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PlacesTableSeeder extends Seeder
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
        	DB::Table('places')->insert([
        		'name'           => $faker-> city,
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
    }
}
