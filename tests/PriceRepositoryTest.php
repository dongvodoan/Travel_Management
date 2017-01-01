<?php

use App\Models\Price;
use App\Repositories\PriceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PriceRepositoryTest extends TestCase
{
    use MakePriceTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PriceRepository
     */
    protected $priceRepo;

    public function setUp()
    {
        parent::setUp();
        $this->priceRepo = App::make(PriceRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePrice()
    {
        $price = $this->fakePriceData();
        $createdPrice = $this->priceRepo->create($price);
        $createdPrice = $createdPrice->toArray();
        $this->assertArrayHasKey('id', $createdPrice);
        $this->assertNotNull($createdPrice['id'], 'Created Price must have id specified');
        $this->assertNotNull(Price::find($createdPrice['id']), 'Price with given id must be in DB');
        $this->assertModelData($price, $createdPrice);
    }

    /**
     * @test read
     */
    public function testReadPrice()
    {
        $price = $this->makePrice();
        $dbPrice = $this->priceRepo->find($price->id);
        $dbPrice = $dbPrice->toArray();
        $this->assertModelData($price->toArray(), $dbPrice);
    }

    /**
     * @test update
     */
    public function testUpdatePrice()
    {
        $price = $this->makePrice();
        $fakePrice = $this->fakePriceData();
        $updatedPrice = $this->priceRepo->update($fakePrice, $price->id);
        $this->assertModelData($fakePrice, $updatedPrice->toArray());
        $dbPrice = $this->priceRepo->find($price->id);
        $this->assertModelData($fakePrice, $dbPrice->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePrice()
    {
        $price = $this->makePrice();
        $resp = $this->priceRepo->delete($price->id);
        $this->assertTrue($resp);
        $this->assertNull(Price::find($price->id), 'Price should not exist in DB');
    }
}
