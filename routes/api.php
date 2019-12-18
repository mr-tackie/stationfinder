<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'RegisterController@register');
Route::get('/regions', 'RegionController@index');
Route::get('/region/{region}', 'RegionController@show');
Route::post('/region', 'RegionController@store');
Route::delete('/region/{region}', 'RegionController@delete');
Route::put('/region/{region}', 'RegionController@update');

Route::get('/closest-stations', 'UserQueryController@getClosestStations');
