<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TourApiTest extends TestCase
{
    use MakeTourTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTour()
    {
        $tour = $this->fakeTourData();
        $this->json('POST', '/api/v1/tours', $tour);

        $this->assertApiResponse($tour);
    }

    /**
     * @test
     */
    public function testReadTour()
    {
        $tour = $this->makeTour();
        $this->json('GET', '/api/v1/tours/'.$tour->id);

        $this->assertApiResponse($tour->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTour()
    {
        $tour = $this->makeTour();
        $editedTour = $this->fakeTourData();

        $this->json('PUT', '/api/v1/tours/'.$tour->id, $editedTour);

        $this->assertApiResponse($editedTour);
    }

    /**
     * @test
     */
    public function testDeleteTour()
    {
        $tour = $this->makeTour();
        $this->json('DELETE', '/api/v1/tours/'.$tour->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tours/'.$tour->id);

        $this->assertResponseStatus(404);
    }
}
