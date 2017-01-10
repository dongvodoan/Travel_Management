<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    public $table = 'users';
    

    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'username' => 'string',
        'email' => 'string',
        'password' => 'string',
    ];

    /**
     * Validation rules create
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:50|min:5',
        'username' => 'required|max:50|min:5',
        'email' => 'required',
        'password' => 'required', 
    ];
}
