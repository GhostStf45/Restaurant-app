<?php

use GuzzleHttp\Middleware;
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
Route::put('/perfil/suspended', 'UserController@suspendAccount')->name('user.suspend');
Route::put('/perfil/activated', 'UserController@activateAccount')->name('user.activate');

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
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

/* =====================CART SECTION =============================== */
Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
Route::get('/add-to-cart/drink/{drink}', 'CartController@addDrink')->name('cart.add.drink')->middleware('auth');
Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/cart/clear', 'CartController@clear')->name('cart.clear')->middleware('auth');
Route::get('/cart/update/{itemId}', 'CartController@update')->name('cart.update')->middleware('auth');

/*====================== CHECKOUT METHOD ========== */

Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');

Route::resource('orders', 'OrderController')->middleware('auth');

/* =====================PAYPAL METHOD ==================== */
Route::get('paypal/checkout/{order}', 'PaypalController@getExpressCheckout')->name('paypal.checkout');
Route::get('paypal/checkout-success/{order}', 'PaypalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel', 'PaypalController@cancelPage')->name('paypal.cancel');

/* =========================================SATISFACTION SECTION ============================================= */
Route::get('/satisfaction', 'SatisfactionController@create')->name('satisfaction.create');
Route::get('/satisfaction/save', 'SatisfactionController@save')->name('satisfaction.save');




/* ======================================================== ADMIN CONTENT ======================================================== */
Route::get('/storage/{filename}', 'ProductController@getImage');
Route::group(['prefix' => 'admin'], function () {

    Voyager::routes();
    Route::get('/admin/charts', 'AdminChartsController@index')->name('admin_charts.read');
    Route::get('/admin/charts/advice/all', 'AdminChartsController@MoreFrencuently')->name('admin_charts.all');
    Route::get('/admin/charts/dishes', 'AdminChartsController@MoreFrencuentlyDish')->name('admin_charts.dishes');
    Route::get('/admin/charts/districts', 'AdminChartsController@MoreFrencuentlyDistrict')->name('admin_charts.districts');
    Route::get('/admin/charts/days', 'AdminChartsController@MoreFrencuentlyDays')->name('admin_charts.days');
    Route::get('/admin/charts/lastDaysAdvice', 'AdminChartsController@last7DaysCreatedAtAdviceData')->name('admin_charts.last7Days');
});
