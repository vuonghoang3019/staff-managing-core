<?php

use Illuminate\Support\Facades\Route;

Route::prefix('course')->group(function () {
    Route::get('/', [
        'as'         => 'course.index',
        'uses'       => 'AdminCourseController@index',
        'middleware' => 'can:course-list'
    ]);
    Route::get('/create', [
        'as'         => 'course.create',
        'uses'       => 'AdminCourseController@create',
        'middleware' => 'can:course-add'
    ]);
    Route::post('/store', [
        'as'   => 'course.store',
        'uses' => 'AdminCourseController@store'
    ]);
    Route::get('/edit/{id}', [
        'as'         => 'course.edit',
        'uses'       => 'AdminCourseController@edit',
        'middleware' => 'can:course-update'
    ]);
    Route::post('/update/{id}', [
        'as'   => 'course.update',
        'uses' => 'AdminCourseController@update'
    ]);
    Route::get('/delete/{id}', [
        'as'         => 'course.delete',
        'uses'       => 'AdminCourseController@delete',
        'middleware' => 'can:course-delete'
    ]);
    Route::get('/action/{id}', [
        'as'   => 'course.action',
        'uses' => 'AdminCourseController@action'
    ]);
    Route::post('/store/price', [
        'as'   => 'course.storePrice',
        'uses' => 'AdminCourseController@storePrice'
    ]);
    Route::post('/update/price/{id}', [
        'as'   => 'course.updatePrice',
        'uses' => 'AdminCourseController@updatePrice'
    ]);
});
