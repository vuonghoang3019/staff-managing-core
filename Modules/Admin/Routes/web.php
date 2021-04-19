<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::prefix('category')->group(function () {
        Route::get('/', [
            'as'   => 'category.index',
            'uses' => 'AdminCategoryController@index'
        ]);
        Route::get('/create', [
            'as'   => 'category.create',
            'uses' => 'AdminCategoryController@create'
        ]);
        Route::post('/store', [
            'as'   => 'category.store',
            'uses' => 'AdminCategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'category.edit',
            'uses' => 'AdminCategoryController@edit'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'category.update',
            'uses' => 'AdminCategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'   => 'category.delete',
            'uses' => 'AdminCategoryController@delete'
        ]);
        Route::get('/action/{id}', [
            'as'   => 'category.action',
            'uses' => 'AdminCategoryController@action'
        ]);
    });
    Route::prefix('grade')->group(function () {
        Route::get('/', [
            'as'   => 'grade.index',
            'uses' => 'AdminGradeController@index'
        ]);
        Route::get('/create', [
            'as'   => 'grade.create',
            'uses' => 'AdminGradeController@create'
        ]);
        Route::post('/store', [
            'as'   => 'grade.store',
            'uses' => 'AdminGradeController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'grade.edit',
            'uses' => 'AdminGradeController@edit'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'grade.update',
            'uses' => 'AdminGradeController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'   => 'grade.delete',
            'uses' => 'AdminGradeController@delete'
        ]);
    });
    Route::prefix('teacher')->group(function () {
        Route::get('/', [
            'as'   => 'teacher.index',
            'uses' => 'AdminTeacherController@index'
        ]);
        Route::get('/create', [
            'as'   => 'teacher.create',
            'uses' => 'AdminTeacherController@create'
        ]);
        Route::post('/store', [
            'as'   => 'teacher.store',
            'uses' => 'AdminTeacherController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'teacher.edit',
            'uses' => 'AdminTeacherController@edit'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'teacher.update',
            'uses' => 'AdminTeacherController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'   => 'teacher.delete',
            'uses' => 'AdminTeacherController@delete'
        ]);
    });
    Route::prefix('course')->group(function () {
        Route::get('/', [
            'as'   => 'course.index',
            'uses' => 'AdminCourseController@index'
        ]);
        Route::get('/create', [
            'as'   => 'course.create',
            'uses' => 'AdminCourseController@create'
        ]);
        Route::post('/store', [
            'as'   => 'course.store',
            'uses' => 'AdminCourseController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'course.edit',
            'uses' => 'AdminCourseController@edit'
        ]);
        Route::get('/delete/{id}', [
            'as'   => 'course.delete',
            'uses' => 'AdminCourseController@delete'
        ]);
        Route::get('/action/{id}', [
            'as'   => 'course.action',
            'uses' => 'AdminCourseController@action'
        ]);
    });
});
