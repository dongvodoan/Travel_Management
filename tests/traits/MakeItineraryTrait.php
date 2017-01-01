<?php

use Faker\Factory as Faker;
use App\Models\Itinerary;
use App\Repositories\ItineraryRepository;

trait MakeItineraryTrait
{
    /**
     * Create fake instance of Itinerary and save it in database
     *
     * @param array $itineraryFields
     * @return Itinerary
     */
    public function makeItinerary($itineraryFields = [])
    {
        /** @var ItineraryRepository $itineraryRepo */
        $itineraryRepo = App::make(ItineraryRepository::class);
        $theme = $this->fakeItineraryData($itineraryFields);
        return $itineraryRepo->create($theme);
    }

    /**
     * Get fake instance of Itinerary
     *
     * @param array $itineraryFields
     * @return Itinerary
     */
    public function fakeItinerary($itineraryFields = [])
    {
        return new Itinerary($this->fakeItineraryData($itineraryFields));
    }

    /**
     * Get fake data of Itinerary
     *
     * @param array $postFields
     * @return array
     */
    public function fakeItineraryData($itineraryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'content' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $itineraryFields);
    }
}
