<?php

use Illuminate\Support\Facades\Route;

Route::prefix('role')->group(function () {
    Route::get('/', [
        'as'         => 'role.index',
        'uses'       => 'AdminRoleController@index',
        'middleware' => 'can:role-list'
    ]);
    Route::get('/create', [
        'as'         => 'role.create',
        'uses'       => 'AdminRoleController@create',
        'middleware' => 'can:role-add'
    ]);
    Route::post('/store', [
        'as'   => 'role.store',
        'uses' => 'AdminRoleController@store'
    ]);
    Route::get('/edit/{id}', [
        'as'         => 'role.edit',
        'uses'       => 'AdminRoleController@edit',
        'middleware' => 'can:role-update'
    ]);
    Route::post('/update/{id}', [
        'as'   => 'role.update',
        'uses' => 'AdminRoleController@update'
    ]);
    Route::get('/delete/{id}', [
        'as'         => 'role.delete',
        'uses'       => 'AdminRoleController@delete',
        'middleware' => 'can:role-delete'
    ]);
});
