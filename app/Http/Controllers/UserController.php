<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

use App\Libraries\StandardResponse;
use App\Libraries\HTTPStatusCodes;

use App\Models\User;
use Hash;
use Log;
use Illuminate\Support\Facades\Input;
use Auth;

/**
 *  UserController
 *
 *  This class will be used to manage the User object.
 */
class UserController extends Controller
{

    /**
     *  createUser
     *
     *  Creates a new User record.
     */
    public function createUser(Request $request)
    {

        // Validate key parameters
        $validator = Validator::make(Input::all(), [
            "name" => "required|max:255",
            "email" => "required|email|max:255|unique:users,email",
            "password" => "required|min:8|max:16"
        ]);

        // On fail, return error messages.
        if($validator->fails())
        {
            return StandardResponse::json($validator->errors(), 400);
        }

        // Fill User object, create password and api_token hashes.
        $user = User::create(Input::all());

        // Return User object.
        return StandardResponse::json([
            "user" => $user, 
            "api_token" => $user->api_token
        ], 200);

    }

    /**
     *  getUser
     *
     *  Returns a User record.
     */
    public function getUser(Request $request)
    {
        $user = Auth::guard('api')->user();
        return StandardResponse::json($user, 200);
    }

    /**
     *  editUser
     *
     *  Edits a user record.
     */
    public function editUser(Request $request)
    {
        $user = Auth::guard('api')->user();

        // Validate key parameters
        $validator = Validator::make(Input::all(), [
            "name" => "max:255",
            "email" => "email|max:255|unique:users,email",
            "password" => "min:8|max:16"
        ]);

        // On fail, return error messages.
        if($validator->fails())
        {
            return StandardResponse::json($validator->errors(), 400);
        }

        $user->fill(Input::all());

        if(array_key_exists("password", Input::all()))
        {
            $user->password = Hash::make(Input::get('password'));
        }

        $user->save();

        return StandardResponse::json($user, 200);

    }

    /**
     *  deleteUser
     *
     *  Soft Deletes a User record.
     */
    public function deleteUser(Request $request)
    {
        $user = Auth::guard('api')->user();
        $user->delete();
        return StandardResponse::json($user, 200);
    }

}
