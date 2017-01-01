<?php

use App\Models\Travel;
use App\Repositories\TravelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TravelRepositoryTest extends TestCase
{
    use MakeTravelTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TravelRepository
     */
    protected $travelRepo;

    public function setUp()
    {
        parent::setUp();
        $this->travelRepo = App::make(TravelRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTravel()
    {
        $travel = $this->fakeTravelData();
        $createdTravel = $this->travelRepo->create($travel);
        $createdTravel = $createdTravel->toArray();
        $this->assertArrayHasKey('id', $createdTravel);
        $this->assertNotNull($createdTravel['id'], 'Created Travel must have id specified');
        $this->assertNotNull(Travel::find($createdTravel['id']), 'Travel with given id must be in DB');
        $this->assertModelData($travel, $createdTravel);
    }

    /**
     * @test read
     */
    public function testReadTravel()
    {
        $travel = $this->makeTravel();
        $dbTravel = $this->travelRepo->find($travel->id);
        $dbTravel = $dbTravel->toArray();
        $this->assertModelData($travel->toArray(), $dbTravel);
    }

    /**
     * @test update
     */
    public function testUpdateTravel()
    {
        $travel = $this->makeTravel();
        $fakeTravel = $this->fakeTravelData();
        $updatedTravel = $this->travelRepo->update($fakeTravel, $travel->id);
        $this->assertModelData($fakeTravel, $updatedTravel->toArray());
        $dbTravel = $this->travelRepo->find($travel->id);
        $this->assertModelData($fakeTravel, $dbTravel->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTravel()
    {
        $travel = $this->makeTravel();
        $resp = $this->travelRepo->delete($travel->id);
        $this->assertTrue($resp);
        $this->assertNull(Travel::find($travel->id), 'Travel should not exist in DB');
    }
}
