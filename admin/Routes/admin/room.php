<?php

use Illuminate\Support\Facades\Route;

Route::prefix('rooms')->group(function () {
    Route::get('', 'RoomController@index');
    Route::post('store', 'RoomController@store');
    Route::get('edit/{id}', 'RoomController@edit');
    Route::put('update/{id}', 'RoomController@update');
    Route::delete('delete/{id}', 'RoomController@delete');
});
