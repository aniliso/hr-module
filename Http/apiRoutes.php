<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' =>'ik'], function (Router $router) {
    $router->get('user', [
        'as'         => 'api.hr.application.user',
        'uses'       => 'PublicController@view'
    ])->middleware(['api.token']);
    $router->post('form', [
        'as'         => 'api.hr.application.create',
        'uses'       => 'PublicController@create'
    ]);
    $router->post('form/update', [
        'as'         => 'api.hr.application.update',
        'uses'       => 'PublicController@update'
    ])->middleware(['api.token']);
});