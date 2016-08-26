<?php

namespace App\Http\Controllers;

use App\Libraries\StandardResponse;
use App\Models\Sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function getSports(Request $request)
    {
        $sports = Sport::with('athletes')->with('coaches')->get();

        return StandardResponse::json($sports, 200);
    }
}
