<?php

namespace App\Repositories;

use App\Models\Tour;
use InfyOm\Generator\Common\BaseRepository;

class TourRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'describe',
        'times_id',
        'prices_id',
        'itineraries_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tour::class;
    }
}
