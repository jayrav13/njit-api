<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{

    protected $table = 'semesters';

    protected $guarded = [];

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject', 'semester_id', 'id');
    }

}
