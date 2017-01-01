<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TravelApiTest extends TestCase
{
    use MakeTravelTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTravel()
    {
        $travel = $this->fakeTravelData();
        $this->json('POST', '/api/v1/travels', $travel);

        $this->assertApiResponse($travel);
    }

    /**
     * @test
     */
    public function testReadTravel()
    {
        $travel = $this->makeTravel();
        $this->json('GET', '/api/v1/travels/'.$travel->id);

        $this->assertApiResponse($travel->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTravel()
    {
        $travel = $this->makeTravel();
        $editedTravel = $this->fakeTravelData();

        $this->json('PUT', '/api/v1/travels/'.$travel->id, $editedTravel);

        $this->assertApiResponse($editedTravel);
    }

    /**
     * @test
     */
    public function testDeleteTravel()
    {
        $travel = $this->makeTravel();
        $this->json('DELETE', '/api/v1/travels/'.$travel->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/travels/'.$travel->id);

        $this->assertResponseStatus(404);
    }
}
