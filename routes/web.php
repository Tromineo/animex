<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'apiV1'], function () use ($router) {

    $router->group(['prefix' => 'animes'], function () use ($router) {

        $router->get('/', 'AnimeController@getAll'); 
        $router->get('{id}', 'AnimeController@show');
        $router->post('/', 'AnimeController@create');
        $router->delete('{id}', 'AnimeController@delete');
        $router->put('{id}', 'AnimeController@update');
    });

    $router->post('login', 'AuthController@login');
    $router->post('register', 'AuthController@register');


});