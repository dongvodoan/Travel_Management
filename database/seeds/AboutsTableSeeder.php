<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class AboutsTableSeeder extends Seeder
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
        	DB::Table('abouts')->insert([
        		'title'           => $faker-> streetName,
        		'content'         => $faker-> paragraph,
        		'check'           => $faker-> numberBetween(0,1),
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
    }
}
