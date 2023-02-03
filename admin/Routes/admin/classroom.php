<?php

use Illuminate\Support\Facades\Route;

Route::prefix('classroom')->group(function () {
    Route::get('', 'ClassroomController@index');
    Route::get('create', 'ClassroomController@create');
    Route::post('store', 'ClassroomController@store');
    Route::get('edit/{id}', 'ClassroomController@edit');
    Route::put('update/{id}', 'ClassroomController@update');
    Route::delete('delete/{id}', 'ClassroomController@delete');
});
