<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Time
 * @package App\Models
 * @version December 30, 2016, 10:13 am UTC
 */
class Time extends Model
{
    use SoftDeletes;

    public $table = 'times';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'time',
        'describe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'time' => 'string',
        'describe' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'time' => 'required|max:15',
        'describe' => 'required' 
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tours()
    {
        return $this->hasMany(\App\Models\Tour::class);
    }
    
}
