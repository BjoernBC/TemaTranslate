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


Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Special restrictions - only admins can access these
Route::get(
    '/register',
    [
        'as' => 'register',
        'uses' => 'Auth\RegisterController@showRegistrationForm'
    ]
)->middleware('is_admin');

Route::post(
    '/register',
    [
        'as' => '',
        'uses' => 'Auth\RegisterController@register'
    ]
)->middleware('is_admin');

Route::get('/users', 'userController@index')
    ->name('users')
    ->middleware('auth', 'is_admin');

Route::get('/locale', 'LocaleController@index')
    ->name('locale')
    ->middleware('auth', 'is_admin');

Route::post('/locale', 'LocaleController@store')
    ->name('locale')
    ->middleware('auth', 'is_admin');

Route::post('/products', 'ProductController@store')
    ->name('import')
    ->middleware('auth', 'is_admin');

Route::get('/products', 'ProductController@export')
    ->name('export')
    ->middleware('auth', 'is_admin');

Route::get('/translate', 'TranslationController@index')
    ->name('translate')
    ->middleware('auth');
