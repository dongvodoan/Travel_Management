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
        'content',
        'check'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Travel::class;
    }
}
