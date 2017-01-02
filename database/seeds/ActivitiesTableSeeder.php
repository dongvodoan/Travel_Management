<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class ActivitiesTableSeeder extends Seeder
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
        	DB::Table('activities')->insert([
        		'title'           => $faker-> word,
        		'describe'        => $faker-> paragraph,
        		'content'         => $faker-> paragraph,
        		'types_id'        => rand(1,10),
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
    }
}
