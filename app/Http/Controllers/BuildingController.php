<?php

namespace App\Http\Controllers;

use App\Libraries\StandardResponse;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function getBuildings(Request $request)
    {
        return StandardResponse::json(Building::all(), 200);
    }
}
