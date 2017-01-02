<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TravelsTableSeeder::class);
        $this->call(AboutsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(TimesTableSeeder::class);
        $this->call(CategoryToursTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(ItinerariesTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(ToursTableSeeder::class);
        $this->call(TourPlacesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
    }
}
