<?php

/** @var \Laravel\Lumen\Routing\Router $router */
//api
$router->get('/api/cozinhas', "CozinhaController@getAll");
$router->group(['prefix' => "/api/cozinha"], function() use($router){
    $router->get("/{id}", "CozinhaController@get");
    $router->post("/", "CozinhaController@store");
    $router->put("/{id}", "CozinhaController@update");
    $router->delete("/{id}", "CozinhaController@destroy");

    //metodo errado
    $router->post("/{id}", "CozinhaController@update");
});

//web
$router->get('/cozinhas', "Site\Cozinha\CozinhaControllerWeb@getAll");
$router->group(['prefix' => "/cozinha"], function() use($router){
    $router->get("/{id}", "Site\Cozinha\CozinhaControllerWeb@get");
    $router->post("/", "Site\Cozinha\CozinhaControllerWeb@store");
    $router->get("/update/{id}", "Site\Cozinha\CozinhaControllerWeb@update");
    $router->get("/destroy/{id}", "Site\Cozinha\CozinhaControllerWeb@destroy");
});

$router->get('/', "Site\SiteController@index");
