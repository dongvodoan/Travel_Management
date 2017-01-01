<?php

namespace App\Repositories;

use App\Models\Travel;
use InfyOm\Generator\Common\BaseRepository;

class TravelRepository extends BaseRepository
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
        return Travel::class;
    }
}
