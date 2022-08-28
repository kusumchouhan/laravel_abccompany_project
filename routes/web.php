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



Route::get('/customer', 'CustomersController@index')->name('customer');

Route::get('/customer/{customer}', 'CustomersController@show');

Route::get('/voucher', 'VouchersController@index')->name('voucher');

Route::get('/voucher/{voucher}', 'VouchersController@show');

Route::post('/voucher', 'VouchersController@store');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
