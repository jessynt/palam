<?php
Route::group([
    'prefix'    => 'auth',
    'as'        => 'auth.',
    'namespace' => 'Auth'
], function ($route) {
// 用户登录
    $route->get('login', ['uses' => 'LoginController@showLoginForm', 'as' => 'login']);
    $route->post('login', 'LoginController@login');
    $route->post('logout', ['uses' => 'LoginController@logout', 'as' => 'logout']);

// 用户注册
    $route->get('register', ['uses' => 'RegisterController@showRegistrationForm', 'as' => 'register']);
    $route->post('register', ['uses' => 'RegisterController@register']);
    $route->get('register/verify/{confirmation_code}', ['uses' => 'RegisterController@confirm', 'as' => 'verifyEmail']);

// 密码重置
    $route->get('password/reset', ['uses' => 'ForgotPasswordController@showLinkRequestForm', 'as' => 'passwordReset']);
    $route->post('password/email', ['uses' => 'ForgotPasswordController@sendResetLinkEmail', 'as' => 'passwordSendEmail']);
    $route->get('password/reset/{token}', ['uses' => 'ResetPasswordController@showResetForm', 'as' => 'passwordResetForm']);
    $route->post('password/reset', ['uses' => 'ResetPasswordController@reset']);
});