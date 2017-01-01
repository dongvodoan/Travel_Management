<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Itinerary
 * @package App\Models
 * @version January 1, 2017, 12:21 pm UTC
 */
class Itinerary extends Model
{
    use SoftDeletes;

    public $table = 'itineraries';
    

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
        'title' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tours()
    {
        return $this->hasMany(\App\Models\Tour::class);
    }
    
}
