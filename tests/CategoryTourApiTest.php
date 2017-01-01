<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTourApiTest extends TestCase
{
    use MakeCategoryTourTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCategoryTour()
    {
        $categoryTour = $this->fakeCategoryTourData();
        $this->json('POST', '/api/v1/categoryTours', $categoryTour);

        $this->assertApiResponse($categoryTour);
    }

    /**
     * @test
     */
    public function testReadCategoryTour()
    {
        $categoryTour = $this->makeCategoryTour();
        $this->json('GET', '/api/v1/categoryTours/'.$categoryTour->id);

        $this->assertApiResponse($categoryTour->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCategoryTour()
    {
        $categoryTour = $this->makeCategoryTour();
        $editedCategoryTour = $this->fakeCategoryTourData();

        $this->json('PUT', '/api/v1/categoryTours/'.$categoryTour->id, $editedCategoryTour);

        $this->assertApiResponse($editedCategoryTour);
    }

    /**
     * @test
     */
    public function testDeleteCategoryTour()
    {
        $categoryTour = $this->makeCategoryTour();
        $this->json('DELETE', '/api/v1/categoryTours/'.$categoryTour->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/categoryTours/'.$categoryTour->id);

        $this->assertResponseStatus(404);
    }
}
