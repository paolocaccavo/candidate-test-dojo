<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('customers', 'CustomersController')->except('show');
Route::resource('orders', 'OrdersController');

Auth::routes(['verify' => true]);
