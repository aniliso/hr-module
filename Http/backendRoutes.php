<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/hr'], function (Router $router) {
    $router->bind('hrPosition', function ($id) {
        return app('Modules\Hr\Repositories\PositionRepository')->find($id);
    });
    $router->get('positions', [
        'as' => 'admin.hr.position.index',
        'uses' => 'PositionController@index',
        'middleware' => 'can:hr.positions.index'
    ]);
    $router->get('positions/create', [
        'as' => 'admin.hr.position.create',
        'uses' => 'PositionController@create',
        'middleware' => 'can:hr.positions.create'
    ]);
    $router->post('positions', [
        'as' => 'admin.hr.position.store',
        'uses' => 'PositionController@store',
        'middleware' => 'can:hr.positions.create'
    ]);
    $router->get('positions/{hrPosition}/edit', [
        'as' => 'admin.hr.position.edit',
        'uses' => 'PositionController@edit',
        'middleware' => 'can:hr.positions.edit'
    ]);
    $router->put('positions/{hrPosition}', [
        'as' => 'admin.hr.position.update',
        'uses' => 'PositionController@update',
        'middleware' => 'can:hr.positions.edit'
    ]);
    $router->delete('positions/{hrPosition}', [
        'as' => 'admin.hr.position.destroy',
        'uses' => 'PositionController@destroy',
        'middleware' => 'can:hr.positions.destroy'
    ]);
    $router->bind('hrApplication', function ($id) {
        return app('Modules\Hr\Repositories\ApplicationRepository')->find($id);
    });
    $router->get('applications', [
        'as' => 'admin.hr.application.index',
        'uses' => 'ApplicationController@index',
        'middleware' => 'can:hr.applications.index'
    ]);
    $router->get('applications/create', [
        'as' => 'admin.hr.application.create',
        'uses' => 'ApplicationController@create',
        'middleware' => 'can:hr.applications.create'
    ]);
    $router->post('applications', [
        'as' => 'admin.hr.application.store',
        'uses' => 'ApplicationController@store',
        'middleware' => 'can:hr.applications.create'
    ]);
    $router->get('applications/{hrApplication}/edit', [
        'as' => 'admin.hr.application.edit',
        'uses' => 'ApplicationController@edit',
        'middleware' => 'can:hr.applications.edit'
    ]);
    $router->put('applications/{hrApplication}', [
        'as' => 'admin.hr.application.update',
        'uses' => 'ApplicationController@update',
        'middleware' => 'can:hr.applications.edit'
    ]);
    $router->delete('applications/{hrApplication}', [
        'as' => 'admin.hr.application.destroy',
        'uses' => 'ApplicationController@destroy',
        'middleware' => 'can:hr.applications.destroy'
    ]);
// append


});
