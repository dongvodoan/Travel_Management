<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tour
 * @package App\Models
 * @version January 1, 2017, 12:34 pm UTC
 */
class Tour extends Model
{
    use SoftDeletes;

    public $table = 'tours';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'describe',
        'times_id',
        'prices_id',
        'itineraries_id',
        'category_tours_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'describe' => 'string',
        'times_id' => 'integer',
        'prices_id' => 'integer',
        'itineraries_id' => 'integer',
        'category_tours_id' => 'integer'
    ];

    /**
     * Validation rules create
     *
     * @var array
     */
    public static $create_rules = [
        'title' => 'required|max:200|min:10',
        'describe' => 'required|max:500|min:10',
        'times_id' => 'required',
        'prices_id' => 'required',
        'itineraries_id' => 'required',
        'category_tours_id' => 'required',
        'check_list' => 'required',
        'image' => 'required',
        'image.*' => 'mimes:jpeg,jpg,png|max:8192' 
    ];

    /**
     * Validation rules update
     *
     * @var array
     */
    public static $update_rules = [
        'title' => 'required|max:200|min:10',
        'describe' => 'required|max:500|min:10',
        'times_id' => 'required',
        'prices_id' => 'required',
        'itineraries_id' => 'required',
        'category_tours_id' => 'required',
        'check_list' => 'required',
        'image.*' => 'mimes:jpeg,jpg,png|max:8192' 
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function times()
    {
        return $this->belongsTo(\App\Models\Time::class, 'times_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function prices()
    {
        return $this->belongsTo(\App\Models\Price::class, 'prices_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function itineraries()
    {
        return $this->belongsTo(\App\Models\Itinerary::class, 'itineraries_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category_tours()
    {
        return $this->belongsTo(\App\Models\CategoryTour::class, 'category_tours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function images()
    {
        return $this->hasMany(\App\Models\Image::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function places()
    {
        return $this->belongsToMany(\App\Models\Place::class,'tour_places','tours_id','places_id');
    }    
}
