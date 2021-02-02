<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('projects/{id}/tags', array('uses' => '\App\Api\ApiProjectsController@tags'));
Route::get('photos', array('uses' => '\App\Api\ApiPhotosController@index'));
Route::get('tags/{id}', array('uses' => '\App\Api\ApiTagsController@show'));
Route::get('photos/{id}', array('uses' => '\App\Api\ApiPhotosController@show'));
Route::get('projects/tag/{id}', array('uses' => '\App\Api\ApiProjectsController@tag'));
Route::get('projects/category/{id}', array('uses' => '\App\Api\ApiProjectsController@category'));
Route::get('projects/{id}', array('uses' => '\App\Api\ApiProjectsController@show'));
Route::get('projects/limit/{limit}', array('uses' => '\App\Api\ApiProjectsController@index'));
Route::get('categories', array('uses' => '\App\Api\ApiCategoryController@index'));
Route::get('categories/{id}', array('uses' => '\App\Api\ApiCategoryController@show'));
Route::get('cv', array('uses' => '\App\Api\ApiCareerController@index'));
Route::get('career', array('uses' => '\App\Api\ApiCvController@index'));
Route::get('about', array('uses' => '\App\Api\ApiAboutController@index'));
Route::get('stack', array('uses' => '\App\Api\ApiStackController@index'));
Route::get('spooks', array('uses' => '\App\Api\ApiSpooksController@index'));


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
