<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Hash;

class User extends Authenticatable
{

    use SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    protected $dates = [
        'deleted_at'
    ];

    /**
     * Override this function to have the creating() callback.
     *
     * This callback will set the api_token and hash the password on creation.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function($user)
        {
            $user->api_token = str_random(60);
            $user->password = Hash::make($user->password);
        });
        
    }

}
