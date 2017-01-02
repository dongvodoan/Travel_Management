<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CategoryToursTableSeeder extends Seeder
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
        	DB::Table('category_tours')->insert([
        		'name'            => $faker-> state,
        		'describe'        => $faker-> paragraph,
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
    }
}
