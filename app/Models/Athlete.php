<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    protected $table = 'athletes';

    protected $guarded = [];

    public function sport()
    {
        return $this->belongsTo('App\Models\Sport', 'sport_id', 'id');
    }

}
