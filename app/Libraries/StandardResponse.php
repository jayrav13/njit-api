<?php

namespace App\Libraries;

use Auth;
use Response;

/**
 *  StandardResponse.
 *
 *  This is a custom class written to generate standardized JSON responses
 *  for this project.
 */
class StandardResponse
{
    /**
     *  json.
     *
     *  This function leverages Laravel's Response class to return a
     *  Laravel-friendly HTTP response object that is standardized.
     *
     *  @param  $statusCode
     *  @param  $message
     *  @param  $data
     *
     *  @return \Response
     */
    public static function json($data, $status, $message = null)
    {

        // Increment requests_success if HTTP status is 200.
        if ($status == 200) {
            $user = Auth::guard('api')->user();
            if ($user) {
                $user->requests_success++;
                $user->save();
            } else {
                // An unprotected route is accessing the API.
            }
        }

        $dict = [
            'status'        => $status,
            'response'      => HTTPStatusCodes::code($status),
            'message'       => $message,
            'data'          => $data,
            'response_time' => microtime(true) - LARAVEL_START,
        ];

        return Response::json($dict, $status);
    }
}
