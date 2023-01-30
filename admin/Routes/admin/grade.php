<?php

use Illuminate\Support\Facades\Route;

Route::prefix('grade')->group(function () {
    Route::get('/', [
        'as'         => 'grade.index',
        'uses'       => 'AdminGradeController@index',
        'middleware' => 'can:grade-list'
    ]);
    Route::get('/create', [
        'as'         => 'grade.create',
        'uses'       => 'AdminGradeController@create',
        'middleware' => 'can:grade-add'
    ]);
    Route::post('/store', [
        'as'   => 'grade.store',
        'uses' => 'AdminGradeController@store'
    ]);
    Route::get('/edit/{id}', [
        'as'         => 'grade.edit',
        'uses'       => 'AdminGradeController@edit',
        'middleware' => 'can:grade-update'
    ]);
    Route::post('/update/{id}', [
        'as'   => 'grade.update',
        'uses' => 'AdminGradeController@update'
    ]);
    Route::get('/delete/{id}', [
        'as'         => 'grade.delete',
        'uses'       => 'AdminGradeController@delete',
        'middleware' => 'can:grade-delete'
    ]);
    Route::get('/action/{id}', [
        'as'   => 'grade.action',
        'uses' => 'AdminGradeController@action'
    ]);
});
