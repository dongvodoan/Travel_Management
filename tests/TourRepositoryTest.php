<?php

use App\Models\Tour;
use App\Repositories\TourRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TourRepositoryTest extends TestCase
{
    use MakeTourTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TourRepository
     */
    protected $tourRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tourRepo = App::make(TourRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTour()
    {
        $tour = $this->fakeTourData();
        $createdTour = $this->tourRepo->create($tour);
        $createdTour = $createdTour->toArray();
        $this->assertArrayHasKey('id', $createdTour);
        $this->assertNotNull($createdTour['id'], 'Created Tour must have id specified');
        $this->assertNotNull(Tour::find($createdTour['id']), 'Tour with given id must be in DB');
        $this->assertModelData($tour, $createdTour);
    }

    /**
     * @test read
     */
    public function testReadTour()
    {
        $tour = $this->makeTour();
        $dbTour = $this->tourRepo->find($tour->id);
        $dbTour = $dbTour->toArray();
        $this->assertModelData($tour->toArray(), $dbTour);
    }

    /**
     * @test update
     */
    public function testUpdateTour()
    {
        $tour = $this->makeTour();
        $fakeTour = $this->fakeTourData();
        $updatedTour = $this->tourRepo->update($fakeTour, $tour->id);
        $this->assertModelData($fakeTour, $updatedTour->toArray());
        $dbTour = $this->tourRepo->find($tour->id);
        $this->assertModelData($fakeTour, $dbTour->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTour()
    {
        $tour = $this->makeTour();
        $resp = $this->tourRepo->delete($tour->id);
        $this->assertTrue($resp);
        $this->assertNull(Tour::find($tour->id), 'Tour should not exist in DB');
    }
}
