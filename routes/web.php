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
$router->get('/', function() use ($router){
    return $router->app->version();
});

$router->post('/register','UserController@register');
$router->post('/login','UserController@login');
$router->post('/form', 'FormController@create');
$router->get('/form', 'FormController@index');
$router->get('/form/{id}', 'FormController@show');
$router->get('/form-category/{category}', 'FormController@filter');
$router->put('/form/{id}','FormController@update');
$router->delete('/form/{id}','FormController@destroy');
$router->post('/fillform', 'FillformController@create');
$router->put('/add-wallet','WalletController@add_wallet');
$router->put('/reduce-wallet','WalletController@reduce_wallet');
$router->get('/myform/{id}', 'FormController@myform');