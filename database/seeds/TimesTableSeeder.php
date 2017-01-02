<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create();

    	DB::Table('times')->insert([
    		'time'            => 'Day tour',
    		'describe'        => $faker-> paragraph,
    		'created_at'      => Carbon\Carbon::now()
    	]);

    	DB::Table('times')->insert([
    		'time'            => '2 days',
    		'describe'        => $faker-> paragraph,
    		'created_at'      => Carbon\Carbon::now()
    	]);

    	DB::Table('times')->insert([
    		'time'            => '3 days',
    		'describe'        => $faker-> paragraph,
    		'created_at'      => Carbon\Carbon::now()
    	]);

    	DB::Table('times')->insert([
    		'time'            => '4 days',
    		'describe'        => $faker-> paragraph,
    		'created_at'      => Carbon\Carbon::now()
    	]);

    	DB::Table('times')->insert([
    		'time'            => '5 days',
    		'describe'        => $faker-> paragraph,
    		'created_at'      => Carbon\Carbon::now()
    	]);
        
    }
}
