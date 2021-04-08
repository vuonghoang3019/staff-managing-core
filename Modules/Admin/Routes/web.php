<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::prefix('category')->group(function () {
        Route::get('/', [
            'as'   => 'category.index',
            'uses' => 'AdminCategoryController@index'
        ]);
        Route::get('/create', [
            'as'   => 'category.create',
            'uses' => 'AdminCategoryController@create'
        ]);
        Route::post('/store', [
            'as'   => 'category.store',
            'uses' => 'AdminCategoryController@store'
        ]);
    });
});
