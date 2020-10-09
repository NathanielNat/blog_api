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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });


$router->get('/','BlogController@index');
$router->get('/blogs','BlogController@index');
$router->post('/blogs','BlogController@store');
$router->get('/blogs/{blog}','BlogController@show');
$router->put('/blogs/{blog}','BlogController@update');
$router->patch('/blogs/{blog}','BlogController@update');
$router->delete('/blogs/{blog}','BlogController@destroy');