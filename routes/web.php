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


Route::post('/paypal', 'PaypalController@paypal');
Route::get('/paypal_success', 'PaypalController@paypal_success');
Route::get('/paypal_cancel', 'PaypalController@paypal_cancel');

Route::get('/{any}', 'AppController@index')->where('any', '.*');