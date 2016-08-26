<?php

namespace App\Http\Controllers;

use App\Libraries\StandardResponse;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function getEvents(Request $request)
    {
        return StandardResponse::json(Event::all(), 200);
    }
}
