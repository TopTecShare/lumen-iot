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

$router->post('register/{sensorID}', 'RegisterController@register');
//TODO remove get method, just for testing in browser
$router->get('/register/{sensorID}', 'RegisterController@register');
$router->get('/store/{uuid}', 'StoreController@store');
$router->post('/store/{uuid}', 'StoreController@store');
$router->get('/sensors/{uuid}', 'SensorController@show');
$router->get('/sensors/', 'SensorController@index');



