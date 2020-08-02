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

//--------------------PERFIL DEL USUARIO-----------------------------------------
Route::get('/perfil', 'UserController@config')->name('profile');
Route::put('/perfil/update', 'UserController@update')->name('user.update');
Route::put('/perfil/card/save', 'UserController@createCard')->name('user.card.save');

/* =================Drinks section==================== */
Route::get('/drink', 'DrinkController@index')->name('drink.index');
Route::get('/drink/create', 'DrinkController@create')->name('drink.create');
Route::post('/drink/save', 'DrinkController@store')->name('drink.save');
Route::get('/drink/file/{filename}', 'DrinkController@getImage')->name('drink.file');
Route::get('/drink/{search?}', 'DrinkController@index')->name('drink.search');
/* ==================Products section ================== */
Route::get('/products', 'ProductController@index')->name('product.index');
Route::get('/products/{filtrado?}', 'ProductController@sortBy')->name('products.listaCategoria');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product/save', 'ProductController@store')->name('product.save');
Route::get('/product/file/{filename}', 'ProductController@getImage')->name('product.file');
Route::get('/product/{id}', 'ProductController@getProduct')->name('product.detail');

/* =====================CONTACT SECTION =================================================== */
Route::get('/contact', 'AdviceController@createAdvice')->name('advice.create');
Route::post('/contact/save', 'AdviceController@saveAdvice')->name('advice.save');

/* =====================COMMENT SECTION =================================================== */
Route::post('/comment/save', 'CommentController@save')->name('comment.save');







Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
