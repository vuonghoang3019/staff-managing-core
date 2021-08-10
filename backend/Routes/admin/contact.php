<?php

use Illuminate\Support\Facades\Route;

Route::prefix('contact')->group(function () {
    Route::get('/', [
        'as'   => 'contact.index',
        'uses' => 'AdminContactController@index',
    ]);
    Route::get('/action/{id}', [
        'as'   => 'contact.action',
        'uses' => 'AdminContactController@action',
    ]);
    Route::get('/viewDetail/{id}', [
        'as'   => 'contact.detail',
        'uses' => 'AdminContactController@detail',
    ]);
});
