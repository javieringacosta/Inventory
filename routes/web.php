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

Route::get('/', 'ProductController@index'); //List
Route::get('user/products', 'ProductController@create'); //Create Products
Route::post('products', 'ProductController@store')->name('products.store'); //Save Products
Route::post('shopping', 'ShoppingCartController@index'); //List  


