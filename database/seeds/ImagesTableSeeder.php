<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class ImagesTableSeeder extends Seeder
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
        	DB::Table('images')->insert([
        		'name'              => $faker-> image,
        		'activities_id'     => rand(1,10),
        		'tours_id'          => rand(1,10),
        		'created_at'        => Carbon\Carbon::now()
        	]);
        }
    }
}
