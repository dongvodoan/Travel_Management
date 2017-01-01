<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PriceApiTest extends TestCase
{
    use MakePriceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePrice()
    {
        $price = $this->fakePriceData();
        $this->json('POST', '/api/v1/prices', $price);

        $this->assertApiResponse($price);
    }

    /**
     * @test
     */
    public function testReadPrice()
    {
        $price = $this->makePrice();
        $this->json('GET', '/api/v1/prices/'.$price->id);

        $this->assertApiResponse($price->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePrice()
    {
        $price = $this->makePrice();
        $editedPrice = $this->fakePriceData();

        $this->json('PUT', '/api/v1/prices/'.$price->id, $editedPrice);

        $this->assertApiResponse($editedPrice);
    }

    /**
     * @test
     */
    public function testDeletePrice()
    {
        $price = $this->makePrice();
        $this->json('DELETE', '/api/v1/prices/'.$price->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/prices/'.$price->id);

        $this->assertResponseStatus(404);
    }
}
