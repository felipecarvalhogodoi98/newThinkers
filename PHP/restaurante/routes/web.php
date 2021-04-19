<?php

/** @var \Laravel\Lumen\Routing\Router $router */
//api
$router->get('/cozinhas', "CozinhaController@getAll");
$router->group(['prefix' => "/cozinha"], function() use($router){
    $router->get("/{id}", "CozinhaController@get");
    $router->post("/", "CozinhaController@store");
    $router->put("/{id}", "CozinhaController@update");
    $router->delete("/{id}", "CozinhaController@destroy");
});



$router->get('/', "Api RESTful restaurante!");
