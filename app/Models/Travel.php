<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Travel
 * @package App\Models
 * @version December 30, 2016, 4:37 am UTC
 */
class Travel extends Model
{
    use SoftDeletes;

    public $table = 'travels';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'content',
        'check'
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
        'title' => 'required|max:30|min:3',
        'content' => 'required' 
    ];

    
}
