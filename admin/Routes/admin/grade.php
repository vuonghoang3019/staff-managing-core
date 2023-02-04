<?php

use Illuminate\Support\Facades\Route;

Route::prefix('grade')->group(function () {
    Route::get('', 'GradeController@index',);
    Route::post('store', 'GradeController@store');
    Route::get('edit/{id}', 'GradeController@edit',);
    Route::put('update/{id}', 'GradeController@update');
    Route::delete('delete/{id}', 'GradeController@delete',);
});
