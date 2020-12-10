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

Route::get('peakflow', 'PeakflowController@index');
Route::get('peakflow/{user}', 'PeakflowController@getPeakflowUser'); 
Route::post('peakflow', 'PeakflowController@create');
Route::put('peakflow/{peakflow}', 'PeakflowController@update');
Route::delete('peakflow/{peakflow}', 'PeakflowController@delete');
