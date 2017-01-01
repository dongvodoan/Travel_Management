<?php

use Faker\Factory as Faker;
use App\Models\CategoryTour;
use App\Repositories\CategoryTourRepository;

trait MakeCategoryTourTrait
{
    /**
     * Create fake instance of CategoryTour and save it in database
     *
     * @param array $categoryTourFields
     * @return CategoryTour
     */
    public function makeCategoryTour($categoryTourFields = [])
    {
        /** @var CategoryTourRepository $categoryTourRepo */
        $categoryTourRepo = App::make(CategoryTourRepository::class);
        $theme = $this->fakeCategoryTourData($categoryTourFields);
        return $categoryTourRepo->create($theme);
    }

    /**
     * Get fake instance of CategoryTour
     *
     * @param array $categoryTourFields
     * @return CategoryTour
     */
    public function fakeCategoryTour($categoryTourFields = [])
    {
        return new CategoryTour($this->fakeCategoryTourData($categoryTourFields));
    }

    /**
     * Get fake data of CategoryTour
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCategoryTourData($categoryTourFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'describe' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $categoryTourFields);
    }
}
