<?php

use Illuminate\Support\Facades\Route;

Route::prefix('news')->group(function () {
    Route::get('/', [
        'as'   => 'news.index',
        'uses' => 'AdminNewsController@index',
    ]);
    Route::get('/create', [
        'as'   => 'news.create',
        'uses' => 'AdminNewsController@create',
    ]);
    Route::post('/store', [
        'as'   => 'news.store',
        'uses' => 'AdminNewsController@store',
    ]);
    Route::get('/edit/{id}', [
        'as'   => 'news.edit',
        'uses' => 'AdminNewsController@edit',
    ]);
    Route::post('/update/{id}', [
        'as'   => 'news.update',
        'uses' => 'AdminNewsController@update',
    ]);
    Route::get('/delete/{id}', [
        'as'   => 'news.delete',
        'uses' => 'AdminNewsController@delete',
    ]);
    Route::get('/news/{id}', [
        'as'   => 'news.action',
        'uses' => 'AdminNewsController@action',
    ]);
});
