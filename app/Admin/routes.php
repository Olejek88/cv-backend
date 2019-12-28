<?php

use App\Admin\Controllers\ProjectController;
use App\Admin\Controllers\TagsController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('tags', TagsController::class);
    $router->resource('projects', ProjectController::class);
});
