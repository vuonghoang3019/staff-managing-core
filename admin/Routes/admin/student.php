<?php

use Illuminate\Support\Facades\Route;


Route::prefix('student')->group(function () {
    Route::get('/', [
        'as'         => 'student.index',
        'uses'       => 'AdminStudentController@index',
        'middleware' => 'can:student-list'
    ]);
    Route::get('/create', [
        'as'         => 'student.create',
        'uses'       => 'AdminStudentController@create',
        'middleware' => 'can:student-add'
    ]);
    Route::post('/store', [
        'as'   => 'student.store',
        'uses' => 'AdminStudentController@store'
    ]);
    Route::get('/edit/{id}', [
        'as'         => 'student.edit',
        'uses'       => 'AdminStudentController@edit',
        'middleware' => 'can:student-update'
    ]);
    Route::post('/update/{id}', [
        'as'   => 'student.update',
        'uses' => 'AdminStudentController@update'
    ]);
    Route::get('/delete/{id}', [
        'as'         => 'student.delete',
        'uses'       => 'AdminStudentController@delete',
        'middleware' => 'can:student-delete'
    ]);
    Route::get('/action/{id}', [
        'as'   => 'student.action',
        'uses' => 'AdminStudentController@action'
    ]);
    Route::get('/ajaxGetSelect', [
        'as'   => 'student.ajaxGetSelect',
        'uses' => 'AdminStudentController@ajaxGetSelect'
    ]);
    Route::post('search', [
        'as'   => 'student.search',
        'uses' => 'AdminStudentController@searchPost'
    ]);
    Route::get('/exportExcel', [
        'as'   => 'student.exportExcel',
        'uses' => 'AdminStudentController@exportIntoExcel'
    ]);
    Route::post('/importExcel', [
        'as'   => 'student.importExcel',
        'uses' => 'AdminStudentController@importIntoExcel'
    ]);
});
