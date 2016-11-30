<?php
//Route::get('/tags', 'Home\HomeController@tags');
//Route::get('/archives', 'Home\HomeController@archives');
Route::get('/atom', 'Home\FeedController@atom');
//Route::get('/post/{slug}.html', ['uses' => 'Home\HomeController@show', 'as' => 'home.show']);


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
Route::get('{vue?}', 'Home\HomeController@index')->where('vue', '[\/\w\.-]*');
