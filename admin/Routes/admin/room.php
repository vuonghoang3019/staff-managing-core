<?php

use Illuminate\Support\Facades\Route;

Route::prefix('room')->group(function () {
    Route::get('/', [
        'as'   => 'room.index',
        'uses' => 'AdminRoomController@index',
    ]);
    Route::get('/create', [
        'as'   => 'room.create',
        'uses' => 'AdminRoomController@create',
    ]);
    Route::post('/store', [
        'as'   => 'room.store',
        'uses' => 'AdminRoomController@store',
    ]);
    Route::get('/edit/{id}', [
        'as'   => 'room.edit',
        'uses' => 'AdminRoomController@edit',
    ]);
    Route::post('/update/{id}', [
        'as'   => 'room.update',
        'uses' => 'AdminRoomController@update',
    ]);
    Route::get('/delete/{id}', [
        'as'   => 'room.delete',
        'uses' => 'AdminRoomController@delete',
    ]);
    Route::get('/action/{id}', [
        'as'   => 'room.action',
        'uses' => 'AdminRoomController@action',
    ]);
});
