<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Building;
use App\Libraries\StandardResponse;

class BuildingController extends Controller
{

    public function getBuildings(Request $request)
    {
        return StandardResponse::json(Building::all(), 200);
    }

}
