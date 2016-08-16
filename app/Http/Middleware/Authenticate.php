<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Libraries\StandardResponse;
use Log;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            return StandardResponse::json(null, 401);
        }
        else {
            $user = Auth::guard('api')->user();
            $user->requests_total++;
            $user->save();
        }

        return $next($request);
    }
}
