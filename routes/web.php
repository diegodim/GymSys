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

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.home');


    Route::get('client', 'ClientController@index')->name('admin.client');
    Route::get('client/create', 'ClientController@create')->name('client.create');
    Route::post('client/store', 'ClientController@store')->name('client.store');
    Route::get('client/{id}/edit/', 'ClientController@edit')->name('client.edit');
    Route::put('client/{client}', 'ClientController@update')->name('client.update');
    Route::delete('client/{client}', 'ClientController@destroy')->name('client.destroy');

    Route::get('payment', 'PaymentController@index')->name('admin.payment');
    Route::get('payment/{id}/register', 'PaymentController@register')->name('payment.register');
    Route::post('payment/{id}/store', 'PaymentController@store')->name('payment.store');


});


Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();


