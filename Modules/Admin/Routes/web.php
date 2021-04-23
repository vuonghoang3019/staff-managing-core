<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('dashboard');
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
        Route::get('/action/{id}', [
            'as'   => 'grade.action',
            'uses' => 'AdminGradeController@action'
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
        Route::post('/update/{id}', [
            'as'   => 'course.update',
            'uses' => 'AdminCourseController@update'
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
    Route::prefix('classroom')->group(function () {
        Route::get('/', [
            'as'   => 'classroom.index',
            'uses' => 'AdminClassroomController@index'
        ]);
        Route::get('/create', [
            'as'   => 'classroom.create',
            'uses' => 'AdminClassroomController@create'
        ]);
        Route::post('/store', [
            'as'   => 'classroom.store',
            'uses' => 'AdminClassroomController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'classroom.edit',
            'uses' => 'AdminClassroomController@edit'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'classroom.update',
            'uses' => 'AdminClassroomController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'   => 'classroom.delete',
            'uses' => 'AdminClassroomController@delete'
        ]);
        Route::get('/action/{id}', [
            'as'   => 'classroom.action',
            'uses' => 'AdminClassroomController@action'
        ]);
    });
    Route::prefix('student')->group(function () {
        Route::get('/', [
            'as'   => 'student.index',
            'uses' => 'AdminStudentController@index'
        ]);
        Route::get('/create', [
            'as'   => 'student.create',
            'uses' => 'AdminStudentController@create'
        ]);
        Route::post('/store', [
            'as'   => 'student.store',
            'uses' => 'AdminStudentController@store'
        ]);
    });
});
