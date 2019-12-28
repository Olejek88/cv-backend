<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Api\ApiTagsController;
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
Route::get('tags', array('uses' => '\App\Api\ApiTagsController@index'));
Route::get('projects', array('uses' => '\App\Api\ApiProjectsController@index'));
Route::get('photos', array('uses' => '\App\Api\ApiPhotosController@index'));
Route::get('tags/{id}', array('uses' => '\App\Api\ApiTagsController@show'));
Route::get('photos/{id}', array('uses' => '\App\Api\ApiPhotosController@show'));
Route::get('projects/{id}', array('uses' => '\App\Api\ApiProjectsController@show'));

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
