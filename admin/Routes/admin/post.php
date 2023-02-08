<?php

use Illuminate\Support\Facades\Route;

Route::prefix('posts')->group(function () {
    Route::get('', 'PostController@index');
    Route::get('create', 'PostController@create');
    Route::post('store', 'PostController@store');
    Route::get('edit/{id}', 'PostController@edit');
    Route::put('update/{id}', 'PostController@update');
    Route::delete('delete/{id}', 'PostController@delete');
});
