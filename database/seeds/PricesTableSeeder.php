<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PricesTableSeeder extends Seeder
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
        	DB::Table('prices')->insert([
        		'title'           => $faker-> word,
        		'price' 		  => $faker-> randomNumber(2),
        		'content'         => $faker-> paragraph,
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
    }
}
