<?php
/** @var Route $api */
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers', 'middleware' => 'cors'], function ($api) {
        $api->post('auth/login', 'AuthController@authenticate');
        $api->get('post/archive', 'PostController@archive');
        $api->resource('post', 'PostController', ['except' => 'edit,update,destroy']);
        $api->resource('tag', 'TagController', ['except' => 'edit,update,destroy']);
        $api->resource('category', 'CategoryController', ['except' => 'edit,update,destroy']);
        $api->group(['middleware' => 'jwt.auth'], function ($api) {
        });
    });
});