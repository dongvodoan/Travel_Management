<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItineraryApiTest extends TestCase
{
    use MakeItineraryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateItinerary()
    {
        $itinerary = $this->fakeItineraryData();
        $this->json('POST', '/api/v1/itineraries', $itinerary);

        $this->assertApiResponse($itinerary);
    }

    /**
     * @test
     */
    public function testReadItinerary()
    {
        $itinerary = $this->makeItinerary();
        $this->json('GET', '/api/v1/itineraries/'.$itinerary->id);

        $this->assertApiResponse($itinerary->toArray());
    }

    /**
     * @test
     */
    public function testUpdateItinerary()
    {
        $itinerary = $this->makeItinerary();
        $editedItinerary = $this->fakeItineraryData();

        $this->json('PUT', '/api/v1/itineraries/'.$itinerary->id, $editedItinerary);

        $this->assertApiResponse($editedItinerary);
    }

    /**
     * @test
     */
    public function testDeleteItinerary()
    {
        $itinerary = $this->makeItinerary();
        $this->json('DELETE', '/api/v1/itineraries/'.$itinerary->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/itineraries/'.$itinerary->id);

        $this->assertResponseStatus(404);
    }
}
