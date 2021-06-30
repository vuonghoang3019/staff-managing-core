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
    Route::get('/register', [
        'as'         => 'register',
        'uses'       => 'auth\RegisterController@getRegister',
    ]);
    Route::post('/postRegister', [
        'as'         => 'postRegister',
        'uses'       => 'auth\RegisterController@postRegister',
    ]);
    Route::get('/verifyAccount', [
        'as'         => 'verify.account',
        'uses'       => 'auth\RegisterController@verifyAccount',
    ]);
    Route::get('/login', [
        'as'         => 'login',
        'uses'       => 'auth\LoginController@getLogin',
    ]);
    Route::post('/postLogin', [
        'as'         => 'postLogin.User',
        'uses'       => 'auth\LoginController@postLogin',
        'middleware'    => 'checkStatus',
    ]);
    Route::get('userInfo/{id}', [
        'as'         => 'user.info',
        'uses'       => 'auth\UserController@index',
    ]);
    Route::post('updatePassword/{id}', [
        'as'         => 'user.update.password',
        'uses'       => 'auth\UserController@updatePassword',
    ]);
    Route::get('getPassword', [
        'as'         => 'get.reset.password',
        'uses'       => 'auth\ForgotPasswordController@getFormResetPassword',
    ]);
    Route::post('getCodeReset', [
        'as'         => 'send.code.reset',
        'uses'       => 'auth\ForgotPasswordController@sendCodeResetPassword',
    ]);
    Route::get('password/reset', [
        'as'         => 'password.reset',
        'uses'       => 'auth\ForgotPasswordController@resetPassword',
    ]);
    Route::post('password/saveResetPassword', [
        'as'         => 'password.updatePassword',
        'uses'       => 'auth\ForgotPasswordController@saveResetPassword',
    ]);
    Route::get('logout', 'auth\LoginController@logoutUser')->name('logoutUser');
});
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/teacher', 'TeacherController@index')->name('teacher');
Route::get('/teacherType/{is_check}', 'TeacherController@getTypeTeacher')->name('get.type.teacher');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{id}', 'NewsController@detail')->name('news.detail');

Route::get('/recruitment', 'RecruitmentController@index')->name('recruitment');
Route::get('/recruitmentDetail/{id}', 'RecruitmentController@detail')->name('recruitment.detail');
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
    Route::get('payment/{idPrice}/{idCourse}', [
        'as'         => 'payment.course.index',
        'uses'       => 'CourseController@payment',
    ]);
    Route::post('/payment/online', [
        'as'         => 'payment.online',
        'uses'       => 'CourseController@postPay',
    ]);
    Route::get('vnpay/return', [
        'as'         => 'vnpay.return',
        'uses'       => 'CourseController@vnpayReturn',
    ]);
});
Route::prefix('contact')->group(function () {
    Route::get('/', 'ContactController@index')->name('contact');
    Route::post('/store', [
        'as'         => 'contact.store',
        'uses'       => 'ContactController@store',
    ]);
});


