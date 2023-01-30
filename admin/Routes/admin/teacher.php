<?php

use Illuminate\Support\Facades\Route;

Route::prefix('teacher')->group(function () {
    Route::get('/', [
        'as'         => 'teacher.index',
        'uses'       => 'AdminTeacherController@index',
        'middleware' => 'can:teacher-list'
    ]);
    Route::get('/create', [
        'as'         => 'teacher.create',
        'uses'       => 'AdminTeacherController@create',
        'middleware' => 'can:teacher-add'
    ]);
    Route::post('/store', [
        'as'   => 'teacher.store',
        'uses' => 'AdminTeacherController@store'
    ]);
    Route::get('/edit/{id}', [
        'as'         => 'teacher.edit',
        'uses'       => 'AdminTeacherController@edit',
        'middleware' => 'can:teacher-update'
    ]);
    Route::post('/update/{id}', [
        'as'   => 'teacher.update',
        'uses' => 'AdminTeacherController@update'
    ]);
    Route::get('/delete/{id}', [
        'as'         => 'teacher.delete',
        'uses'       => 'AdminTeacherController@delete',
        'middleware' => 'can:teacher-delete'
    ]);
    Route::get('/exportExcel', [
        'as'   => 'teacher.export',
        'uses' => 'AdminTeacherController@exportIntoExcel'
    ]);
});
