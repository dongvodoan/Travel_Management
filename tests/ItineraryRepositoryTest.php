<?php

use App\Models\Itinerary;
use App\Repositories\ItineraryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItineraryRepositoryTest extends TestCase
{
    use MakeItineraryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ItineraryRepository
     */
    protected $itineraryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->itineraryRepo = App::make(ItineraryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateItinerary()
    {
        $itinerary = $this->fakeItineraryData();
        $createdItinerary = $this->itineraryRepo->create($itinerary);
        $createdItinerary = $createdItinerary->toArray();
        $this->assertArrayHasKey('id', $createdItinerary);
        $this->assertNotNull($createdItinerary['id'], 'Created Itinerary must have id specified');
        $this->assertNotNull(Itinerary::find($createdItinerary['id']), 'Itinerary with given id must be in DB');
        $this->assertModelData($itinerary, $createdItinerary);
    }

    /**
     * @test read
     */
    public function testReadItinerary()
    {
        $itinerary = $this->makeItinerary();
        $dbItinerary = $this->itineraryRepo->find($itinerary->id);
        $dbItinerary = $dbItinerary->toArray();
        $this->assertModelData($itinerary->toArray(), $dbItinerary);
    }

    /**
     * @test update
     */
    public function testUpdateItinerary()
    {
        $itinerary = $this->makeItinerary();
        $fakeItinerary = $this->fakeItineraryData();
        $updatedItinerary = $this->itineraryRepo->update($fakeItinerary, $itinerary->id);
        $this->assertModelData($fakeItinerary, $updatedItinerary->toArray());
        $dbItinerary = $this->itineraryRepo->find($itinerary->id);
        $this->assertModelData($fakeItinerary, $dbItinerary->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteItinerary()
    {
        $itinerary = $this->makeItinerary();
        $resp = $this->itineraryRepo->delete($itinerary->id);
        $this->assertTrue($resp);
        $this->assertNull(Itinerary::find($itinerary->id), 'Itinerary should not exist in DB');
    }
}
