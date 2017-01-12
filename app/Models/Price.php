<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Price
 * @package App\Models
 * @version December 30, 2016, 10:25 am UTC
 */
class Price extends Model
{
    use SoftDeletes;

    public $table = 'prices';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'price',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|max:30|min:3',
        'content' => 'required',
        'price'  => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tours()
    {
        return $this->hasMany(\App\Models\Tour::class);
    }
}
