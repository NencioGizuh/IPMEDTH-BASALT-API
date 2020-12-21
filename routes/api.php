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

Route::middleware('auth:api')->get('getbreathingexercisesuser', 'BreathingExerciseController@index');
Route::middleware('auth:api')->post('createbreathingexercise', 'BreathingExerciseController@create');
Route::middleware('auth:api')->put('updatebreathingexercise/{id}', 'BreathingExerciseController@update');
Route::middleware('auth:api')->delete('deletebreathingexercise/{id}', 'BreathingExerciseController@delete');

Route::middleware('auth:api')->get('gettriggersuser', 'TriggerController@index');
Route::middleware('auth:api')->post('createtriggers', 'TriggerController@create');
Route::middleware('auth:api')->put('updatetriggers', 'TriggerController@update');
Route::middleware('auth:api')->delete('deletetriggers', 'TriggerController@delete');

Route::get('getmedication', 'MedicationController@index');
Route::post('createmedication', 'MedicationController@create');
Route::put('updatemedication/{id}', 'MedicationController@update');
Route::delete('deletemedication/{id}', 'MedicationController@delete');

Route::middleware('auth:api')->get('getmedicationsuser', 'MedicationUserController@index');
Route::middleware('auth:api')->post('createmedicationsuser', 'MedicationUserController@create');
Route::middleware('auth:api')->put('updatemedicationsuser/{id}', 'MedicationUserController@update');
Route::middleware('auth:api')->delete('deletemedicationsuser/{id}', 'MedicationUserController@delete');