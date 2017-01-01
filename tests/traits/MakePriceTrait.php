<?php

use Faker\Factory as Faker;
use App\Models\Price;
use App\Repositories\PriceRepository;

trait MakePriceTrait
{
    /**
     * Create fake instance of Price and save it in database
     *
     * @param array $priceFields
     * @return Price
     */
    public function makePrice($priceFields = [])
    {
        /** @var PriceRepository $priceRepo */
        $priceRepo = App::make(PriceRepository::class);
        $theme = $this->fakePriceData($priceFields);
        return $priceRepo->create($theme);
    }

    /**
     * Get fake instance of Price
     *
     * @param array $priceFields
     * @return Price
     */
    public function fakePrice($priceFields = [])
    {
        return new Price($this->fakePriceData($priceFields));
    }

    /**
     * Get fake data of Price
     *
     * @param array $postFields
     * @return array
     */
    public function fakePriceData($priceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'price' => $fake->randomDigitNotNull,
            'content' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $priceFields);
    }
}
