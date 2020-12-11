<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;

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

Route::post('register','AuthController@register');
Route::post('login','AuthController@login');
Route::post('refresh', 'AuthController@refresh');
Route::middleware('auth:api')->post('logout', 'AuthController@logout');

Route::middleware('auth:api')->get('getpeakflowuser', 'PeakflowController@index');
Route::middleware('auth:api')->post('createpeakflow', 'PeakflowController@create');
Route::middleware('auth:api')->put('updatepeakflow/{id}', 'PeakflowController@update');
Route::middleware('auth:api')->delete('deletepeakflow/{id}', 'PeakflowController@delete');

Route::middleware('auth:api')->get('getactionplanuser', 'ActionPlanController@index');
Route::middleware('auth:api')->post('createactionplan', 'ActionPlanController@create');
Route::middleware('auth:api')->put('updateactionplan', 'ActionPlanController@update');
Route::middleware('auth:api')->delete('deleteactionplan', 'ActionPlanController@delete');