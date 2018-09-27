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
