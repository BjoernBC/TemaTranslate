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

Auth::routes();

Route::get(
    '/users/add',
    [
        'as' => 'register',
        'uses' => 'Auth\RegisterController@showRegistrationForm'
    ]
)->middleware('is_admin');

Route::post(
    '/users/add',
    [
        'as' => 'user.store',
        'uses' => 'Auth\RegisterController@register'
    ]
)->middleware('is_admin');

Route::get('/users', 'userController@index')
    ->name('user.index')
    ->middleware('auth', 'is_admin');

Route::get('/locales', 'LocaleController@index')
    ->name('locale.index')
    ->middleware('auth', 'is_admin');

Route::post('/locales', 'LocaleController@store')
    ->name('locale.store')
    ->middleware('auth', 'is_admin');

Route::get('/products', 'ProductController@index')
    ->name('product.index')
    ->middleware('auth', 'is_admin');

Route::post('/products', 'ProductController@store')
    ->name('product.store')
    ->middleware('auth', 'is_admin');

Route::get('/products/{product}', 'ProductController@show')
    ->name('product.show')
    ->middleware('auth', 'is_admin');

Route::get('/translate', 'TranslationController@index')
    ->name('translate.index')
    ->middleware('auth');
