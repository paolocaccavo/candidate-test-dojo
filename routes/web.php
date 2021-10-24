<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('customers', 'CustomersController')->except('show');
Route::get('/customers/trashed', 'CustomersController@trashed')->name('customers.trashed');
Route::post('/customers/restore/{customer}', 'CustomersController@restore')->name('customers.restore');

Route::resource('orders', 'OrdersController');

Auth::routes(['verify' => true]);
