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

Route::redirect('/', '/home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{filtrado?}', 'HomeController@sortBy')->name('home.listaCategoria');

/* =================Drinks section==================== */
Route::get('/drink', 'DrinkController@index')->name('drink.index');
/* ==================Products section ================== */
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product/save', 'ProductController@store')->name('product.save');
Route::get('/product/file/{filename}', 'ProductController@getImage')->name('product.file');




