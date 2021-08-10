<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth/admin'], function () {
    Route::get('login', [
        'as'         => 'getLogin',
        'uses'       => 'auth\LoginController@getLogin',
    ]);
    Route::post('post/login', [
        'as'         => 'postLogin',
        'uses'       => 'auth\LoginController@postLogin',
    ]);
    Route::get('logout', [
        'as'         => 'logout',
        'uses'       => 'auth\LoginController@logout',
    ]);
    Route::get('get/password/reset', [
        'as'         => 'get.form.reset',
        'uses'       => 'auth\ForgotPasswordAdminController@getFormResetPassword',
    ]);
    Route::post('get/code/reset', [
        'as'         => 'get.code.reset',
        'uses'       => 'auth\ForgotPasswordAdminController@getCodeResetPassword',
    ]);
    Route::get('password/reset/admin', [
        'as'         => 'password.reset.admin',
        'uses'       => 'auth\ForgotPasswordAdminController@getResetPassword',
    ]);
    Route::post('password/save/password', [
        'as'         => 'password.updatePassword.admin',
        'uses'       => 'auth\ForgotPasswordAdminController@saveResetPassword',
    ]);
});
