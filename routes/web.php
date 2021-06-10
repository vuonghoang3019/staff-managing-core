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
Route::group(['prefix' => 'auth'],function (){
    Route::get('/register', 'auth\LoginController@getRegister')->name('register');
    Route::post('/postRegister', 'auth\LoginController@postRegister')->name('postRegister');
    Route::get('/login', 'auth\LoginController@getLogin')->name('login');
    Route::post('/postLogin', 'auth\LoginController@postLogin')->name('postLogin.User');
    Route::get('/logout', 'auth\LoginController@logout')->name('logout.User');
});

Route::get('/about', 'AboutController@index')->name('about');
Route::get('/teacher', 'TeacherController@index')->name('teacher');
Route::get('/recruitment', 'RecruitmentController@index')->name('recruitment');
Route::get('/recruitmentDetail/{id}', 'RecruitmentController@detail')->name('recruitmentDetail');
Route::prefix('course')->group(function () {
    Route::get('/', [
        'as'         => 'course',
        'uses'       => 'CourseController@index',
    ]);
    Route::get('/courseDetail/{id}', [
        'as'         => 'course.detail',
        'uses'       => 'CourseController@detail',
    ]);
    Route::get('/courseDetail/showCart/{idPrice},{idCourse}', [
        'as'         => 'course.showCart',
        'uses'       => 'CourseController@showCart',
    ]);
});
Route::prefix('contact')->group(function () {
    Route::get('/', 'ContactController@index')->name('contact');
    Route::post('/store', [
        'as'         => 'contact.store',
        'uses'       => 'ContactController@store',
    ]);
});
Route::get('payment','PaymentController@index')->name('payment.index');
//Route::post('payment/online','PaymentController@index')->name('payment.online');


