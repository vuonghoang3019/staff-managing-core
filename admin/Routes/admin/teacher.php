<?php

use Illuminate\Support\Facades\Route;

Route::prefix('teachers')->group(function () {
    Route::get('', 'TeacherController@index');
    Route::get('create', 'TeacherController@create');
    Route::post('store', 'TeacherController@store');
    Route::get('edit/{id}', 'TeacherController@edit');
    Route::put('update/{id}', 'TeacherController@update');
    Route::delete('delete/{id}', 'TeacherController@delete');
    Route::get('exportExcel', 'TeacherController@exportIntoExcel');
});
