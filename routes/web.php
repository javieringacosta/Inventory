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

Route::get('/', 'ProductController@index')->name('index'); //List
Route::get('admin/products', 'ProductController@create')->name('admin.products'); //Create Products
Route::post('products', 'ProductController@store')->name('products.store'); //Save Products
Route::get('user/shopping', 'ShoppingCartController@index')->name('user.shopping'); //List  
Route::post('user/shopping', 'ShoppingCartController@store')->name('shopping.add'); //List  
Route::get('user/shoppings/cart', 'ShoppingCartController@pay')->name('shopping.pay'); //List  
Route::get('user/shoppings/cancel', 'ShoppingCartController@cancel')->name('shopping.cancel'); //List  


