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

// Users
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
Route::put('/', 'userController@setLocale')
    ->name('user.setLocale');

// Locales
Route::get('/locales', 'LocaleController@index')
    ->name('locale.index')
    ->middleware('auth', 'is_admin');

Route::post('/locales', 'LocaleController@store')
    ->name('locale.store')
    ->middleware('auth', 'is_admin');

// Products
Route::get('/products', 'ProductController@index')
    ->name('product.index')
    ->middleware('auth');

Route::get('/products/add', 'ProductController@create')
    ->name('product.create')
    ->middleware('auth', 'is_admin');

Route::post('/products', 'ProductController@store')
    ->name('product.store')
    ->middleware('auth');

Route::get('/products/export', 'ProductController@export')
    ->name('export')
    ->middleware('auth');

Route::post('products/import', 'ProductController@import')
    ->name('import')
    ->middleware('auth');

Route::get('/products/{product}', 'ProductController@show')
    ->name('product.show')
    ->middleware('auth');

// Translations
Route::get('/translate', 'TranslationController@index')
    ->name('product.translate')
    ->middleware('auth');

Route::post('/translate', 'TranslationController@store')
    ->name('product.translate')
    ->middleware('auth');
