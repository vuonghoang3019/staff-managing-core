<?php

use Illuminate\Support\Facades\Route;

Route::prefix('permission')->group(function () {
    Route::get('/', [
        'as'         => 'permission.index',
        'uses'       => 'AdminPermissionController@index',
        'middleware' => 'can:permission-list'
    ]);
    Route::post('/store', [
        'as'   => 'permission.store',
        'uses' => 'AdminPermissionController@store'
    ]);
    Route::get('/edit/{id}', [
        'as'         => 'permission.edit',
        'uses'       => 'AdminPermissionController@edit',
        'middleware' => 'can:permission-update'
    ]);
    Route::post('/update/{id}', [
        'as'   => 'permission.update',
        'uses' => 'AdminPermissionController@update'
    ]);
    Route::get('/delete/{id}', [
        'as'         => 'permission.delete',
        'uses'       => 'AdminPermissionController@delete',
        'middleware' => 'can:permission-delete'
    ]);
});
