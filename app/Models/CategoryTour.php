<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CategoryTour
 * @package App\Models
 * @version December 30, 2016, 9:21 am UTC
 */
class CategoryTour extends Model
{
    use SoftDeletes;

    public $table = 'category_tours';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'describe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'describe' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:30|min:3'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tours()
    {
        return $this->hasMany(\App\Models\Tour::class);
    }
    
}
