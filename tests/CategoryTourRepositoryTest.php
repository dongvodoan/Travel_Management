<?php

use App\Models\CategoryTour;
use App\Repositories\CategoryTourRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTourRepositoryTest extends TestCase
{
    use MakeCategoryTourTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CategoryTourRepository
     */
    protected $categoryTourRepo;

    public function setUp()
    {
        parent::setUp();
        $this->categoryTourRepo = App::make(CategoryTourRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCategoryTour()
    {
        $categoryTour = $this->fakeCategoryTourData();
        $createdCategoryTour = $this->categoryTourRepo->create($categoryTour);
        $createdCategoryTour = $createdCategoryTour->toArray();
        $this->assertArrayHasKey('id', $createdCategoryTour);
        $this->assertNotNull($createdCategoryTour['id'], 'Created CategoryTour must have id specified');
        $this->assertNotNull(CategoryTour::find($createdCategoryTour['id']), 'CategoryTour with given id must be in DB');
        $this->assertModelData($categoryTour, $createdCategoryTour);
    }

    /**
     * @test read
     */
    public function testReadCategoryTour()
    {
        $categoryTour = $this->makeCategoryTour();
        $dbCategoryTour = $this->categoryTourRepo->find($categoryTour->id);
        $dbCategoryTour = $dbCategoryTour->toArray();
        $this->assertModelData($categoryTour->toArray(), $dbCategoryTour);
    }

    /**
     * @test update
     */
    public function testUpdateCategoryTour()
    {
        $categoryTour = $this->makeCategoryTour();
        $fakeCategoryTour = $this->fakeCategoryTourData();
        $updatedCategoryTour = $this->categoryTourRepo->update($fakeCategoryTour, $categoryTour->id);
        $this->assertModelData($fakeCategoryTour, $updatedCategoryTour->toArray());
        $dbCategoryTour = $this->categoryTourRepo->find($categoryTour->id);
        $this->assertModelData($fakeCategoryTour, $dbCategoryTour->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCategoryTour()
    {
        $categoryTour = $this->makeCategoryTour();
        $resp = $this->categoryTourRepo->delete($categoryTour->id);
        $this->assertTrue($resp);
        $this->assertNull(CategoryTour::find($categoryTour->id), 'CategoryTour should not exist in DB');
    }
}
