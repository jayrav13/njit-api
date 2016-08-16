<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Libraries\StandardResponse;
use App\Models\Event;

class EventsController extends Controller
{

    public function getEvents(Request $request)
    {
        return StandardResponse::json(Event::all(), 200);
    }

}
