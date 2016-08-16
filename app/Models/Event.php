<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'events';

    protected $fillable = [
        'name',
        'summary',
        'location',
        'dtstart',
        'dtend',
        'all_day',
        'organization',
        'description',
        'category'
    ];
}
