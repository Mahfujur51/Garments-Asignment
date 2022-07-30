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

// Route::get('/', function () {
//     return view('welcome');
// });

// use App\Http\Controllers\ProductController;

Route::get('/','ProductController@index')->name('product');
Route::get('/product','ProductController@fetch_data')->name('product.data');
Route::post('/product/update','ProductController@update')->name('product.update');
