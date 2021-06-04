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
Route::get('/contact', 'RecruitmentController@index')->name('contact');
Route::get('/recruitment', 'RecruitmentController@index')->name('recruitment');
Route::get('/recruitmentDetail/{id}', 'RecruitmentController@detail')->name('recruitmentDetail');
Route::get('/course', 'AboutController@index')->name('course');
