<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [
    'as' => 'index',
    'uses' => 'App\Http\Controllers\PageController@getIndex'
]);

Route::get('product-grid/{type}', [
    'as' => 'product-grid',
    'uses' => 'App\Http\Controllers\PageController@getProductGrid'
]);

Route::get('product-list/{type}', [
    'as' => 'product-list',
    'uses' => 'App\Http\Controllers\PageController@getProductList'
]);

Route::get('product/{id}', [
    'as' => 'product',
    'uses' => 'App\Http\Controllers\PageController@getProduct'
]);

Route::get('contact', [
    'as' => 'contact',
    'uses' => 'App\Http\Controllers\PageController@getContact'
]);

Route::get('add-to-cart/{id}', [
    'as' => 'add-to-cart',
    'uses' => 'App\Http\Controllers\PageController@getAddToCart'
]);

Route::get('del-cart/{id}', [
    'as' => 'del-cart',
    'uses' => 'App\Http\Controllers\PageController@getDelCart'
]);

Route::get('checkout', [
    'as' => 'checkout',
    'uses' => 'App\Http\Controllers\PageController@getCheckOut'
]);

Route::post('checkout', [
    'as' => 'checkout',
    'uses' => 'App\Http\Controllers\PageController@postCheckOut'
]);

Route::get('login', [
    'as' => 'login',
    'uses' => 'App\Http\Controllers\PageController@getLogin'
]);

Route::post('login', [
    'as' => 'login',
    'uses' => 'App\Http\Controllers\PageController@postLogin'
]);

Route::get('logout', [
    'as' => 'logout',
    'uses' => 'App\Http\Controllers\PageController@getLogout'
]);

Route::get('signup', [
    'as' => 'signup',
    'uses' => 'App\Http\Controllers\PageController@getSignUp'
]);

Route::post('signup', [
    'as' => 'signup',
    'uses' => 'App\Http\Controllers\PageController@postSignUp'
]);

Route::get('search', [
    'as' => 'search',
    'uses' => 'App\Http\Controllers\PageController@getSearch'
]);