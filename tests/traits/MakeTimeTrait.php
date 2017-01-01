<?php

use Faker\Factory as Faker;
use App\Models\Time;
use App\Repositories\TimeRepository;

trait MakeTimeTrait
{
    /**
     * Create fake instance of Time and save it in database
     *
     * @param array $timeFields
     * @return Time
     */
    public function makeTime($timeFields = [])
    {
        /** @var TimeRepository $timeRepo */
        $timeRepo = App::make(TimeRepository::class);
        $theme = $this->fakeTimeData($timeFields);
        return $timeRepo->create($theme);
    }

    /**
     * Get fake instance of Time
     *
     * @param array $timeFields
     * @return Time
     */
    public function fakeTime($timeFields = [])
    {
        return new Time($this->fakeTimeData($timeFields));
    }

    /**
     * Get fake data of Time
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTimeData($timeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'time' => $fake->word,
            'describe' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $timeFields);
    }
}
