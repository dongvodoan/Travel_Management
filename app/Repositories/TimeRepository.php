<?php

namespace App\Repositories;

use App\Models\Time;
use InfyOm\Generator\Common\BaseRepository;

class TimeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'time',
        'describe'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Time::class;
    }
}
