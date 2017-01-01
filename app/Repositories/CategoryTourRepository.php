<?php

namespace App\Repositories;

use App\Models\CategoryTour;
use InfyOm\Generator\Common\BaseRepository;

class CategoryTourRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'describe'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CategoryTour::class;
    }
}
