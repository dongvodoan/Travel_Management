<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Place
 * @package App\Models
 * @version January 1, 2017, 3:45 pm UTC
 */
class Place extends Model
{
    use SoftDeletes;

    public $table = 'places';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:30|min:5'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function tours()
    {
        return $this->belongsToMany(App\Models\Tour::class,'tour_places','places_id','tours_id');
    } 
    
}
