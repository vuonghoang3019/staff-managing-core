<?php

use Illuminate\Support\Facades\Route;

Route::prefix('classroom')->group(function () {
    Route::get('/', [
        'as'         => 'classroom.index',
        'uses'       => 'AdminClassroomController@index',
        'middleware' => 'can:classroom-list'
    ]);
    Route::get('/create', [
        'as'         => 'classroom.create',
        'uses'       => 'AdminClassroomController@create',
        'middleware' => 'can:classroom-add',
    ]);
    Route::post('/store', [
        'as'   => 'classroom.store',
        'uses' => 'AdminClassroomController@store'
    ]);
    Route::get('/edit/{id}', [
        'as'         => 'classroom.edit',
        'uses'       => 'AdminClassroomController@edit',
        'middleware' => 'can:classroom-update'
    ]);
    Route::post('/update/{id}', [
        'as'   => 'classroom.update',
        'uses' => 'AdminClassroomController@update'
    ]);
    Route::get('/delete/{id}', [
        'as'         => 'classroom.delete',
        'uses'       => 'AdminClassroomController@delete',
        'middleware' => 'can:classroom-delete'
    ]);
    Route::get('/action/{id}', [
        'as'   => 'classroom.action',
        'uses' => 'AdminClassroomController@action'
    ]);
});
