<?php

use Illuminate\Support\Facades\Route;

Route::prefix('payment')->group(function () {
    Route::get('/', [
        'as'   => 'payment.index',
        'uses' => 'AdminPaymentController@index',
    ]);
    Route::get('search/classroom', [
        'as'   => 'payment.search.classroom',
        'uses' => 'AdminPaymentController@searchClassroom'
    ]);
    Route::post('search/name', [
        'as'   => 'payment.search.name',
        'uses' => 'AdminPaymentController@searchName'
    ]);
});
