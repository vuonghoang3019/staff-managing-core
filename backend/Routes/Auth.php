<?php

use Illuminate\Support\Facades\Route;

Route::get('login', 'LoginController@getLogin')->name('admin.getLogin');
Route::post('login', 'LoginController@postLogin')->name('admin.postLogin');
Route::get('logout', 'LoginController@logout')->name('admin.auth.logout');
Route::get('reset-password', 'LoginController@getResetPassword')->name('admin.getResetPassword');
