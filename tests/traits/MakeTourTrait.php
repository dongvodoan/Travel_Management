<?php

use Faker\Factory as Faker;
use App\Models\Tour;
use App\Repositories\TourRepository;

trait MakeTourTrait
{
    /**
     * Create fake instance of Tour and save it in database
     *
     * @param array $tourFields
     * @return Tour
     */
    public function makeTour($tourFields = [])
    {
        /** @var TourRepository $tourRepo */
        $tourRepo = App::make(TourRepository::class);
        $theme = $this->fakeTourData($tourFields);
        return $tourRepo->create($theme);
    }

    /**
     * Get fake instance of Tour
     *
     * @param array $tourFields
     * @return Tour
     */
    public function fakeTour($tourFields = [])
    {
        return new Tour($this->fakeTourData($tourFields));
    }

    /**
     * Get fake data of Tour
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTourData($tourFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'describe' => $fake->text,
            'times_id' => $fake->randomDigitNotNull,
            'prices_id' => $fake->randomDigitNotNull,
            'itineraries_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tourFields);
    }
}
