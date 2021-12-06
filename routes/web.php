<?php

use Illuminate\Support\Facades\Artisan;
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
$router->get('/sensors', [
    'middleware' => 'auth',
    'uses' => 'SensorController@index'
]);
$router->post('/lora/{id}', 'LoraController@lora');

$router->get('/login','LoginController@form');
$router->post('/login','LoginController@login');

$router->get('/forgot-password','ForgotPasswordController@form');
$router->post('/forgot-password','ForgotPasswordController@reset');

$router->get('/reset-password','ResetPasswordController@form');
$router->post('/reset-password','ResetPasswordController@reset');

$router->get('/interface', [
    'middleware' => 'auth',
    'uses' => 'InterfaceController@form'
]);
$router->post('/interface', [
    'middleware' => 'auth',
    'uses' => 'InterfaceController@get'
]);

$router->get('/admin', [
    'middleware' => ['auth', 'admin'], 
    'uses' => 'AdminController@index'
]);
$router->post('/admin', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'AdminController@create'
]);
$router->put('/admin', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'AdminController@update'
]);
$router->delete('/admin', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'AdminController@delete'
]);

$router->get('/migrate', function() {
    $exitCode = Artisan::call('migrate');
    return '<h1>Migration finished</h1>';
});

$router->get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Optimization finished</h1>';
});


