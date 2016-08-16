<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{

    protected $table = 'sports';

    protected $guarded = [
        'created_at', 'updated_at', 'id'
    ];

    public function athletes()
    {
        return $this->hasMany('App\Models\Athlete', 'sport_id', 'id');
    }

    public function coaches()
    {
        return $this->hasMany('App\Models\Coach', 'sport_id', 'id');
    }

}
