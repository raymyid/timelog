<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Route::group([
    'prefix' => 'auth'], function () {
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('auth.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
        ->name('auth.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
        ->name('auth.password.email');
}
);

Route::get('/u/{value}', 'UserController@index')->name('user.index');
Route::get('/p/{value}', 'PostController@show')->name('post.show');

Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/post/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::get('/post', 'PostController@index')->name('post.index');
Route::post('/post', 'PostController@store')->name('post.store');
