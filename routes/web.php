<?php

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

/** @var \Laravel\Lumen\Routing\Router $router */
$router->group(['prefix' => 'pets'], function () use ($router) {
    $router->get('/', [
        'as' => 'pets', 'uses' => 'PetController@index'
    ]);
    $router->get('{id}', [
        'as' => 'pet', 'uses' => 'PetController@show'
    ]);
    $router->get('view/{id}', [
        'as' => 'pet.public', 'uses' => 'PetController@publicShow'
    ]);
    $router->put('{id}', [
        'as' => 'pet.update', 'uses' => 'PetController@update'
    ]);
    $router->post('/', [
        'as' => 'pet.new', 'uses' => 'PetController@store'
    ]);
    $router->delete('{id}', [
        'as' => 'pet.destroy', 'uses' => 'PetController@show'
    ]);
});

$router->group(['prefix' => 'organizations'], function () use ($router) {
    $router->put('{id}', [
        'as' => 'organization.update', 'uses' => 'OrganizationController@update'
    ]);
    $router->post('/', [
        'as' => 'organization.new', 'uses' => 'OrganizationController@store'
    ]);
    $router->delete('{id}', [
        'as' => 'organization.destroy', 'uses' => 'OrganizationController@show'
    ]);
});

$router->group(['prefix' => 'images'], function () use ($router) {
    $router->put('{id}', [
        'as' => 'image.update', 'uses' => 'ImageController@update'
    ]);
    $router->post('/', [
        'as' => 'image.new', 'uses' => 'ImageController@store'
    ]);
    $router->delete('{id}', [
        'as' => 'image.destroy', 'uses' => 'ImageController@show'
    ]);
});

$router->get('/', function () use ($router) {
    $response = [
        'name' => 'Rescue API',
        'purpose' => 'The goal of the API is to deliver that database layer to the vue js application',
        'data' => [
            'tags' => [
                'pets', 'dogs', 'birds', 'cats', 'horses'
            ]
        ]
    ];

    return json_encode($response);
});
