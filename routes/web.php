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

// Bands

Route::name('band.')->group(function () {
    Route::get('/', 'BandController@index')->name('index');
    Route::post('/', 'BandController@store')->name('store');
    Route::get('band/create', 'BandController@create')->name('create');
    Route::get('band/{band}/edit', 'BandController@edit')->name('edit');
    Route::put('band/{band}', 'BandController@update')->name('update');
    Route::get('band/{band}/delete', 'BandController@destroy')->name('delete');
});


// Albums

Route::name('album.')->prefix('album')->group(function () {
    Route::get('/', 'AlbumController@index')->name('index');
    Route::post('/', 'AlbumController@store')->name('store');
    Route::get('create', 'AlbumController@create')->name('create');
    Route::get('{album}/edit', 'AlbumController@edit')->name('edit');
    Route::put('{album}', 'AlbumController@update')->name('update');
    Route::get('{album}/delete', 'AlbumController@destroy')->name('delete');
});
