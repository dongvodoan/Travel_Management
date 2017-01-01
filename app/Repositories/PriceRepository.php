<?php

namespace App\Repositories;

use App\Models\Price;
use InfyOm\Generator\Common\BaseRepository;

class PriceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price',
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Price::class;
    }
}
