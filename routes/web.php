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


Route::get('/homepage',['uses'=>'CarsController@homepage','as'=>'homepage']);

Route::get('/extras',['uses'=>'CarsController@extras','as'=>'extras']);

Route::get('/reservation',['uses'=>'CarsController@reservation','as'=>'reservation']);

Route::get('/admin',['uses'=>'CarsController@admin','as'=>'admin']);

Route::get('/reservationsTable',['uses'=>'CarsController@reservationsTable','as'=>'reservationsTable']);

Route::get('/categoriesTable',['uses'=>'CarsController@categoriesTable','as'=>'categoriesTable']);

Route::get('/locationsTable',['uses'=>'CarsController@locationsTable','as'=>'locationsTable']);

Route::get('/categories',['uses'=>'CarsController@categories','as'=>'categories']);

Route::get('/order',['uses'=>'CarsController@order','as'=>'order']);

Route::get('/storeCategory',['uses'=>'CarsController@storeCategory','as'=>'storeCategory']);

Route::get('/storeLocation',['uses'=>'CarsController@storeLocation','as'=>'storeLocation']);

Route::get('/payment',['uses'=>'CarsController@payment','as'=>'payment']);

Route::get('/confirmation',['uses'=>'CarsController@confirmation','as'=>'confirmation']);

Route::get('/search',['uses'=>'CarsController@search','as'=>'search']);

Route::get('/reservationFound',['uses'=>'CarsController@reservationFound','as'=>'reservationFound']);

Route::get('/successfulPayment',['uses'=>'CarsController@successfulPayment','as'=>'successfulPayment']);

Route::get('/categoriesDelete',['uses'=>'CarsController@categoriesDelete','as'=>'categoriesDelete']);

Route::get('/locationsDelete',['uses'=>'CarsController@locationsDelete','as'=>'locationsDelete']);
