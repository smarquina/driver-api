<?php

/** @var \Dingo\Api\Routing\Router $api */
$api = app('Dingo\Api\Routing\Router');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api->version('v1', ['namespace' => 'App', 'middleware' => ['api']], function ($api) {
    /** @var Dingo\Api\Routing\Router $api */

    // Public Routes
    $api->group(array('prefix' => 'rides', 'as' => 'ride', 'namespace' => 'Ride\Application\Controllers'), function ($api) {
        $api->get('list', 'RideController@list')->name('list');
        $api->get('list/search/{term}', 'RideController@search')->name('search');

        $api->post('ride', 'RideController@store')->name('store');

    });

});
