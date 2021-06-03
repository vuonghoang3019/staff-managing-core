<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/teacher', 'AboutController@index')->name('teacher');
Route::get('/contact', 'AboutController@index')->name('contact');
Route::get('/enrollment', 'AboutController@index')->name('enrollment');
Route::get('/course', 'AboutController@index')->name('course');
