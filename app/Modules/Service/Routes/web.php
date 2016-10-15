<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'service'], function() {
    Route::get('/', function() {
        dd('This is the Service module index page. Build something great!');
    });
    Route::get('pelanggan/data-table','PelangganController@getDataTable');
    Route::resource('pelanggan','PelangganController');

    Route::get('barang/data-table','BarangServiceController@getDataTable');
    Route::resource('barang','BarangServiceController');
    
});
