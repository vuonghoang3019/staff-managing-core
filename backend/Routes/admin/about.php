<?php

use Illuminate\Support\Facades\Route;

Route::prefix('about')->group(function () {
    Route::get('/', [
        'as'   => 'about.index',
        'uses' => 'AdminAboutController@index',
    ]);
    Route::get('/create', [
        'as'   => 'about.create',
        'uses' => 'AdminAboutController@create',
    ]);
    Route::post('/store', [
        'as'   => 'about.store',
        'uses' => 'AdminAboutController@store',
    ]);
    Route::get('/edit/{id}', [
        'as'   => 'about.edit',
        'uses' => 'AdminAboutController@edit',
    ]);
    Route::post('/update/{id}', [
        'as'   => 'about.update',
        'uses' => 'AdminAboutController@update',
    ]);
    Route::get('/delete/{id}', [
        'as'   => 'about.delete',
        'uses' => 'AdminAboutController@delete',
    ]);
    Route::get('/action/{id}', [
        'as'   => 'about.action',
        'uses' => 'AdminAboutController@action',
    ]);
});
