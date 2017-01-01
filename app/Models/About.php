<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class About
 * @package App\Models
 * @version December 30, 2016, 4:40 am UTC
 */
class About extends Model
{
    use SoftDeletes;

    public $table = 'abouts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'content' => 'required'
    ];

    
}
