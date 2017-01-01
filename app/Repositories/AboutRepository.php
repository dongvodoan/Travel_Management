<?php

namespace App\Repositories;

use App\Models\About;
use InfyOm\Generator\Common\BaseRepository;

class AboutRepository extends BaseRepository
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
        return About::class;
    }
}
