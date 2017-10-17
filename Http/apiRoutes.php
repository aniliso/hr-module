<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' =>'ik'], function (Router $router) {
    $router->post('form', [
        'as'         => 'api.hr.form',
        'uses'       => 'PublicController@store'
    ]);
});