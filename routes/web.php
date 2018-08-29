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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/webshop', 'webshop_controller@index');

Route::get('/webshop/category/{categories}', 'webshop_controller@index');

Route::get('/webshop/article/{article}', 'ArticlesController@index');

Route::get('/cart', 'ShoppingCartController@index');

Route::get('/cart/article/{article}', 'ShoppingCartController@call');

Route::post('/cart/article/', 'ShoppingCartController@updateItem');

Route::get('/cart/remove/{id}', 'ShoppingCartController@delete');

Route::get('/order/clientdata/', 'OrderController@clientdata');

Route::post('/client/save/', 'ClientController@save');