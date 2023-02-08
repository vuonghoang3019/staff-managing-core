<?php

use Illuminate\Support\Facades\Route;

Route::prefix('course')->group(function () {
    Route::get('', 'CourseController@index');
    Route::get('create', 'CourseController@create');
    Route::post('store', 'CourseController@store');
    Route::get('edit/{id}', 'CourseController@edit',);
    Route::put('update/{id}', 'CourseController@update');
    Route::delete('delete/{id}', 'CourseController@delete');
    Route::post('store/price', 'CourseController@storePrice');
    Route::put('update/price/{id}', 'CourseController@updatePrice');
});
