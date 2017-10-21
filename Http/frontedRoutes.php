<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' =>''], function (Router $router) {
    $router->bind('hrPositionSlug', function ($slug) {
        return app('Modules\Hr\Repositories\PositionRepository')->findBySlug($slug);
    });
    $router->get(LaravelLocalization::transRoute('hr::routes.position.index'), [
        'as'         => 'hr.position.index',
        'uses'       => 'PublicController@index'
    ]);
    $router->get(LaravelLocalization::transRoute('hr::routes.position.view'), [
        'as'         => 'hr.position.view',
        'uses'       => 'PublicController@view'
    ]);
    $router->get(LaravelLocalization::transRoute('hr::routes.application.form'), [
        'as'         => 'hr.application.form',
        'uses'       => 'PublicController@form'
    ]);
    $router->post(LaravelLocalization::transRoute('hr::routes.application.submit'), [
        'as'         => 'hr.application.create',
        'uses'       => 'PublicController@create'
    ]);
});