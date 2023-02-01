<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', 'Auth\LoginController@getLogin')->name('auth.getLogin');
    Route::post('login', 'Auth\LoginController@postLogin')->name('auth.postLogin');
    Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');
    Route::get('reset-password', 'Auth\LoginController@getResetPassword')->name('auth.getResetPassword');
//    Route::get('reset-password', 'Auth\LoginController@getResetPassword')->name('auth.getResetPassword');
//
//    Route::post('getCodeReset', [
//        'as'         => 'get.code.reset',
//        'uses'       => 'auth\ForgotController@getCodeResetPassword',
//    ]);
//    Route::get('password/reset/admin', [
//        'as'         => 'password.reset.admin',
//        'uses'       => 'auth\ForgotController@getResetPassword',
//    ]);
//    Route::post('password/saveResetPassword', [
//        'as'         => 'password.updatePassword.admin',
//        'uses'       => 'auth\ForgotController@saveResetPassword',
//    ]);
});
