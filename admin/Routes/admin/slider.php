<?php

use Illuminate\Support\Facades\Route;

Route::prefix('slider')->group(function () {
    Route::get('/', [
        'as'   => 'slider.index',
        'uses' => 'AdminSliderController@index',
    ]);
    Route::get('/create', [
        'as'   => 'slider.create',
        'uses' => 'AdminSliderController@create',
    ]);
    Route::post('/store', [
        'as'   => 'slider.store',
        'uses' => 'AdminSliderController@store',
    ]);
    Route::get('/edit/{id}', [
        'as'   => 'slider.edit',
        'uses' => 'AdminSliderController@edit',
    ]);
    Route::post('/update/{id}', [
        'as'   => 'slider.update',
        'uses' => 'AdminSliderController@update',
    ]);
    Route::get('/delete/{id}', [
        'as'   => 'slider.delete',
        'uses' => 'AdminSliderController@delete',
    ]);
    Route::get('/action/{id}', [
        'as'   => 'slider.action',
        'uses' => 'AdminSliderController@action',
    ]);
});
