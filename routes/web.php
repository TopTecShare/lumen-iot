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
    return redirect('http://air.nettigo.pl/');
});

$router->post('/register/{sensorID}', 'RegisterController@register');
$router->post('/store/{uuid}', 'StoreController@store');
$router->get('/sensors/{uuid}', [
        'middleware' => 'auth',
        'uses' => 'SensorController@show'
    ]
);
$router->get('/sensors/', [
    'middleware' => 'auth',
    'uses' => 'SensorController@index'
]);

$router->get('/login','LoginController@form');
$router->post('/login','LoginController@login');



