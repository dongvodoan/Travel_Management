<?php

use App\Models\Time;
use App\Repositories\TimeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TimeRepositoryTest extends TestCase
{
    use MakeTimeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TimeRepository
     */
    protected $timeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->timeRepo = App::make(TimeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTime()
    {
        $time = $this->fakeTimeData();
        $createdTime = $this->timeRepo->create($time);
        $createdTime = $createdTime->toArray();
        $this->assertArrayHasKey('id', $createdTime);
        $this->assertNotNull($createdTime['id'], 'Created Time must have id specified');
        $this->assertNotNull(Time::find($createdTime['id']), 'Time with given id must be in DB');
        $this->assertModelData($time, $createdTime);
    }

    /**
     * @test read
     */
    public function testReadTime()
    {
        $time = $this->makeTime();
        $dbTime = $this->timeRepo->find($time->id);
        $dbTime = $dbTime->toArray();
        $this->assertModelData($time->toArray(), $dbTime);
    }

    /**
     * @test update
     */
    public function testUpdateTime()
    {
        $time = $this->makeTime();
        $fakeTime = $this->fakeTimeData();
        $updatedTime = $this->timeRepo->update($fakeTime, $time->id);
        $this->assertModelData($fakeTime, $updatedTime->toArray());
        $dbTime = $this->timeRepo->find($time->id);
        $this->assertModelData($fakeTime, $dbTime->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTime()
    {
        $time = $this->makeTime();
        $resp = $this->timeRepo->delete($time->id);
        $this->assertTrue($resp);
        $this->assertNull(Time::find($time->id), 'Time should not exist in DB');
    }
}
