<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{

    protected $table = 'coaches';

    protected $guarded = [];

    public function sport()
    {
        return $this->belongsTo('App\Models\Sport', 'sport_id', 'id');
    }

}
