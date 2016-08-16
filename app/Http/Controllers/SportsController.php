<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Libraries\StandardResponse;
use App\Models\Sport;

class SportsController extends Controller
{

    public function getSports(Request $request)
    {
        $sports = Sport::with('athletes')->with('coaches')->get();
        return StandardResponse::json($sports, 200);
    }

}
