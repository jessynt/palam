<?php
Route::group(['prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth']
], function () {
    Route::get('/dashboard', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);
    Route::resource('post', 'PostController', ['except' => 'show']);
    Route::resource('category', 'CategoryController', ['except' => 'show']);
    Route::resource('tag', 'TagController', ['except' => 'show']);
    Route::resource('page', 'PageController', ['except' => 'show']);
    Route::resource('media', 'MediaController');
});