<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Activity
 * @package App\Models
 * @version December 30, 2016, 8:39 am UTC
 */
class Activity extends Model
{
    use SoftDeletes;

    public $table = 'activities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'describe',
        'content',
        'types_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'describe' => 'string',
        'types_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'descibe text textarea',
        'describe' => 'required',
        'content' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function types()
    {
        return $this->belongsTo(\App\Models\Type::class, 'types_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function images()
    {
        return $this->hasMany(\App\Models\Image::class);
    }
    
}
