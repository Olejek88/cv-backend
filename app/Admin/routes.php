<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('admin.home');
    //$router->get('/projects', 'ProjectController@index')->name('admin.projects');
    //$router->get('/tags', 'TagsController@index')->name('admin.tags');
    $router->resource('tags', TagsController::class);
    $router->resource('projects', ProjectController::class);
    $router->resource('photo', PhotoController::class);
    $router->resource('categories', CategoriesController::class);
    $router->resource('cv', CvController::class);
});
