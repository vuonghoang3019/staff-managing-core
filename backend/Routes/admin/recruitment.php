<?php

use Illuminate\Support\Facades\Route;

Route::prefix('recruitment')->group(function () {
    Route::get('/', [
        'as'   => 'recruitment.index',
        'uses' => 'AdminRecruitmentController@index',
    ]);
    Route::get('/create', [
        'as'   => 'recruitment.create',
        'uses' => 'AdminRecruitmentController@create',
    ]);
    Route::post('/store', [
        'as'   => 'recruitment.store',
        'uses' => 'AdminRecruitmentController@store',
    ]);
    Route::get('/edit/{id}', [
        'as'   => 'recruitment.edit',
        'uses' => 'AdminRecruitmentController@edit',
    ]);
    Route::post('/update/{id}', [
        'as'   => 'recruitment.update',
        'uses' => 'AdminRecruitmentController@update',
    ]);
    Route::get('/delete/{id}', [
        'as'   => 'recruitment.delete',
        'uses' => 'AdminRecruitmentController@delete',
    ]);
    Route::get('/action/{id}', [
        'as'   => 'recruitment.action',
        'uses' => 'AdminRecruitmentController@action',
    ]);
});
