<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('products','ProductsController@index')->name('products.index');

Route::post('products','ProductsController@store')->name('products.store');

Route::get('products/create','ProductsController@create')->name('products.create');

Route::put('products/{id}','ProductsController@update')->name('products.update');

Route::delete('products/{id}','ProductsController@destroy')->name('products.destroy');

Route::get('products/{id}/edit','ProductsController@edit')->name('products.edit');

Auth::Route();


Route::get('/home', 'HomeController@index')->name('home');

