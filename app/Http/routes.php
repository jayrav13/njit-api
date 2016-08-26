<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// All API routes in v0.1
Route::group(['prefix' => '/api/v0.1'], function () {

    // All protected routes.
    Route::group(['middleware' => ['auth:api']], function () {

        // User Routes.
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UserController@getUser');
            Route::patch('/', 'UserController@editUser');
            Route::delete('/', 'UserController@deleteUser');
        });

        // Building Routes.
        Route::group(['prefix' => 'buildings'], function () {
            Route::get('/', 'BuildingController@getBuildings');
        });

        // Events Routes.
        Route::group(['prefix' => 'events'], function () {
            Route::get('/', 'EventsController@getEvents');
        });

        // Sports Routes.
        Route::group(['prefix' => 'sports'], function () {
            Route::get('/', 'SportsController@getSports');
        });
    });

    // All unprotected routes.
    Route::group(['middleware' => [/* */]], function () {

        // User Routes.
        Route::group(['prefix' => 'users'], function () {
            Route::post('/', 'UserController@createUser');
        });
    });
});
