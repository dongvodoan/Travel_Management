<?php

namespace App\Repositories;

use App\Models\Itinerary;
use InfyOm\Generator\Common\BaseRepository;

class ItineraryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Itinerary::class;
    }
}
