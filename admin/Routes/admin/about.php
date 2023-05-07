<?php

use Illuminate\Support\Facades\Route;

Route::prefix('abouts')->group(function () {
    Route::get('/', 'AboutController@index');
    Route::post('store', 'AboutController@store');
    Route::get('edit/{id}', 'AboutController@edit');
    Route::put('update/{id}', 'AboutController@update');
    Route::delete('delete/{id}', 'AboutController@delete');
});
