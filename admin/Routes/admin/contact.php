<?php

use Illuminate\Support\Facades\Route;

Route::prefix('contact')->group(function () {
    Route::get('', 'ContactController@index');
    Route::get('edit/{id}', 'ContactController@edit');
});
