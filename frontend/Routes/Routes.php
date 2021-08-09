<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);
Route::group(['prefix' => 'auth'], function () {
    Route::get('register', [
        'as'   => 'register',
        'uses' => 'auth\RegisterController@getRegister',
    ]);
    Route::post('post/register', [
        'as'   => 'postRegister',
        'uses' => 'auth\RegisterController@postRegister',
    ]);
    Route::get('verify/account', [
        'as'   => 'verify.account',
        'uses' => 'auth\RegisterController@verifyAccount',
    ]);
    Route::get('login', [
        'as'   => 'login',
        'uses' => 'auth\LoginController@getLogin',
    ]);
    Route::post('post/login', [
        'as'         => 'postLogin.User',
        'uses'       => 'auth\LoginController@postLogin',
//        'middleware' => 'checkStatus',
    ]);
    Route::get('user/info/{id}', [
        'as'   => 'user.info',
        'uses' => 'auth\UserController@index',
    ]);
    Route::post('update/password/{id}', [
        'as'   => 'user.update.password',
        'uses' => 'auth\UserController@updatePassword',
    ]);
    Route::get('get/password', [
        'as'   => 'get.reset.password',
        'uses' => 'auth\ForgotPasswordController@getFormResetPassword',
    ]);
    Route::post('get/codereset', [
        'as'   => 'send.code.reset',
        'uses' => 'auth\ForgotPasswordController@sendCodeResetPassword',
    ]);
    Route::get('password/reset', [
        'as'   => 'password.reset',
        'uses' => 'auth\ForgotPasswordController@resetPassword',
    ]);
    Route::post('password/savepassword', [
        'as'   => 'password.updatePassword',
        'uses' => 'auth\ForgotPasswordController@saveResetPassword',
    ]);
    Route::get('logout', [
        'as'   => 'logoutUser',
        'uses' => 'auth\LoginController@logoutUser',
    ]);
});
Route::get('about', [
    'as'   => 'about',
    'uses' => 'AboutController@index'
]);
Route::prefix('teacher')->group(function () {
    Route::get('', [
        'as'   => 'teacher',
        'uses' => 'TeacherController@index'
    ]);
    Route::get('type/{is_check}', [
        'as'   => 'get.type.teacher',
        'uses' => 'TeacherController@getTypeTeacher'
    ]);
});
Route::prefix('news')->group(function () {
    Route::get('', [
        'as'   => 'news',
        'uses' => 'NewsController@index'
    ]);
    Route::get('detail/{id}', [
        'as'   => 'news.detail',
        'uses' => 'NewsController@detail'
    ]);
});
Route::prefix('recruitment')->group(function () {
    Route::get('', [
        'as'   => 'recruitment',
        'uses' => 'RecruitmentController@index'
    ]);
    Route::get('detail/{id}', [
        'as'   => 'recruitment.detail',
        'uses' => 'RecruitmentController@detail'
    ]);
});
Route::prefix('course')->group(function () {
    Route::get('/', [
        'as'   => 'course',
        'uses' => 'CourseController@index',
    ]);
    Route::get('detail/{id}', [
        'as'   => 'course.detail',
        'uses' => 'CourseController@detail',
    ]);
    Route::get('cart/{idPrice},{idCourse}', [
        'as'   => 'course.showCart',
        'uses' => 'CourseController@showCart',
    ]);
    Route::get('payment/{idPrice}/{idCourse}', [
        'as'   => 'payment.course.index',
        'uses' => 'CourseController@payment',
    ]);
    Route::post('payment/online', [
        'as'   => 'payment.online',
        'uses' => 'CourseController@postPay',
    ]);
    Route::get('vnpay/return', [
        'as'   => 'vnpay.return',
        'uses' => 'CourseController@vnpayReturn',
    ]);
});
Route::prefix('contact')->group(function () {
    Route::get('', [
        'as'   => 'contact',
        'uses' => 'ContactController@index',
    ]);
    Route::post('/store', [
        'as'   => 'contact.store',
        'uses' => 'ContactController@store',
    ]);
});


