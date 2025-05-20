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

$router->get('/items', 'ItemController@index');       
$router->post('/items', 'ItemController@store');        
$router->put('/items/{id}', 'ItemController@update');  
$router->delete('/items/{id}', 'ItemController@destroy'); 
$router->options('{any:.*}', function () {
    return response('', 200);
});
