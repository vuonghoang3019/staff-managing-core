<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'LoginController@login');
Route::post('forgot', 'LoginController@forgot');
