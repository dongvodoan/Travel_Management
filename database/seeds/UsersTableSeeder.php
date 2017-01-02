<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

    	DB::table('users')->insert([
    		'name'            => $faker-> name,
    		'username'        => 'abc123',
    		'email'           => $faker-> freeEmail, 
    		'password'        => bcrypt('123456'),
    		'created_at'      => Carbon\Carbon::now()
    	]);
    }
}
