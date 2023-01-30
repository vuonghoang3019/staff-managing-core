<?php

use Illuminate\Support\Facades\Route;

Route::prefix('schedule')->group(function () {
    Route::get('/', [
        'as'         => 'schedule.index',
        'uses'       => 'AdminScheduleController@index',
        'middleware' => 'can:schedule-list'
    ]);
    Route::get('/create', [
        'as'         => 'schedule.create',
        'uses'       => 'AdminScheduleController@create',
        'middleware' => 'can:schedule-add'
    ]);
    Route::post('/store', [
        'as'   => 'schedule.store',
        'uses' => 'AdminScheduleController@store'
    ]);
    Route::get('/edit/{id}', [
        'as'         => 'schedule.edit',
        'uses'       => 'AdminScheduleController@edit',
        'middleware' => 'can:schedule-update'
    ]);
    Route::post('/update/{id}', [
        'as'   => 'schedule.update',
        'uses' => 'AdminScheduleController@update'
    ]);
    Route::get('/delete/{id}', [
        'as'         => 'schedule.delete',
        'uses'       => 'AdminScheduleController@delete',
        'middleware' => 'can:schedule-delete'
    ]);
    Route::get('/ajax/getSelect', [
        'as'   => 'schedule.ajaxGetSelect',
        'uses' => 'AdminScheduleController@ajaxGetSelect'
    ]);
});
