<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class TypesTableSeeder extends Seeder
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
        	DB::Table('types')->insert([
        		'name'            => $faker-> word,
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
    }
}
