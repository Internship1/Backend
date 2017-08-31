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
//     return view('/auth/login');
// });

Route::get('/', 'KatalogController@index' );

//Route Katalog
Route::resource('katalog','KatalogController');

//Route Kategori
Route::resource('kategori','KategoriController');

// //Auth Routes Login
// Route::get('/auth/login','Auth\LoginController@getLogin');
// Route::post('/auth/login','Auth\AuthController@postLogin');
// Route::get('/auth/logout','Auth\AuthController@getLogout');

// //Auth Routes Register
// Route::get('/auth/register','Auth\AuthController@getRegister');
// Route::post('/auth/register','Auth\AuthController@postRegister');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
