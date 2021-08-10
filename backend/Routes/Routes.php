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
Route::group(['prefix' => 'admin', 'middleware' => ['CheckLogin']], function () {
    Route::get('/', [
        'as'         => 'dashboard',
        'uses'       => 'AdminController@index',
    ]);
    Route::prefix('category')->group(function () {
        Route::get('/', [
            'as'         => 'category.index',
            'uses'       => 'AdminCategoryController@index',
            'middleware' => 'can:category-list'
        ]);
        Route::get('/create', [
            'as'         => 'category.create',
            'uses'       => 'AdminCategoryController@create',
            'middleware' => 'can:category-add'
        ]);
        Route::post('/store', [
            'as'   => 'category.store',
            'uses' => 'AdminCategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'         => 'category.edit',
            'uses'       => 'AdminCategoryController@edit',
            'middleware' => 'can:category-update',
        ]);
        Route::post('/update/{id}', [
            'as'   => 'category.update',
            'uses' => 'AdminCategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'         => 'category.delete',
            'uses'       => 'AdminCategoryController@delete',
            'middleware' => 'can:category-delete'
        ]);
        Route::get('/action/{id}', [
            'as'   => 'category.action',
            'uses' => 'AdminCategoryController@action'
        ]);
    });
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as'   => 'slider.index',
            'uses' => 'AdminSliderController@index',
        ]);
        Route::get('/create', [
            'as'   => 'slider.create',
            'uses' => 'AdminSliderController@create',
        ]);
        Route::post('/store', [
            'as'   => 'slider.store',
            'uses' => 'AdminSliderController@store',
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'slider.edit',
            'uses' => 'AdminSliderController@edit',
        ]);
        Route::post('/update/{id}', [
            'as'   => 'slider.update',
            'uses' => 'AdminSliderController@update',
        ]);
        Route::get('/delete/{id}', [
            'as'   => 'slider.delete',
            'uses' => 'AdminSliderController@delete',
        ]);
        Route::get('/action/{id}', [
            'as'   => 'slider.action',
            'uses' => 'AdminSliderController@action',
        ]);
    });
    Route::prefix('about')->group(function () {
        Route::get('/', [
            'as'   => 'about.index',
            'uses' => 'AdminAboutController@index',
        ]);
        Route::get('/create', [
            'as'   => 'about.create',
            'uses' => 'AdminAboutController@create',
        ]);
        Route::post('/store', [
            'as'   => 'about.store',
            'uses' => 'AdminAboutController@store',
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'about.edit',
            'uses' => 'AdminAboutController@edit',
        ]);
        Route::post('/update/{id}', [
            'as'   => 'about.update',
            'uses' => 'AdminAboutController@update',
        ]);
        Route::get('/delete/{id}', [
            'as'   => 'about.delete',
            'uses' => 'AdminAboutController@delete',
        ]);
        Route::get('/action/{id}', [
            'as'   => 'about.action',
            'uses' => 'AdminAboutController@action',
        ]);
    });
    Route::prefix('grade')->group(function () {
        Route::get('/', [
            'as'         => 'grade.index',
            'uses'       => 'AdminGradeController@index',
            'middleware' => 'can:grade-list'
        ]);
        Route::get('/create', [
            'as'         => 'grade.create',
            'uses'       => 'AdminGradeController@create',
            'middleware' => 'can:grade-add'
        ]);
        Route::post('/store', [
            'as'   => 'grade.store',
            'uses' => 'AdminGradeController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'         => 'grade.edit',
            'uses'       => 'AdminGradeController@edit',
            'middleware' => 'can:grade-update'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'grade.update',
            'uses' => 'AdminGradeController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'         => 'grade.delete',
            'uses'       => 'AdminGradeController@delete',
            'middleware' => 'can:grade-delete'
        ]);
        Route::get('/action/{id}', [
            'as'   => 'grade.action',
            'uses' => 'AdminGradeController@action'
        ]);
    });
    Route::prefix('teacher')->group(function () {
        Route::get('/', [
            'as'         => 'teacher.index',
            'uses'       => 'AdminTeacherController@index',
            'middleware' => 'can:teacher-list'
        ]);
        Route::get('/create', [
            'as'         => 'teacher.create',
            'uses'       => 'AdminTeacherController@create',
            'middleware' => 'can:teacher-add'
        ]);
        Route::post('/store', [
            'as'   => 'teacher.store',
            'uses' => 'AdminTeacherController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'         => 'teacher.edit',
            'uses'       => 'AdminTeacherController@edit',
            'middleware' => 'can:teacher-update'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'teacher.update',
            'uses' => 'AdminTeacherController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'         => 'teacher.delete',
            'uses'       => 'AdminTeacherController@delete',
            'middleware' => 'can:teacher-delete'
        ]);
        Route::get('/exportExcel', [
            'as'   => 'teacher.export',
            'uses' => 'AdminTeacherController@exportIntoExcel'
        ]);
    });
    Route::prefix('course')->group(function () {
        Route::get('/', [
            'as'         => 'course.index',
            'uses'       => 'AdminCourseController@index',
            'middleware' => 'can:course-list'
        ]);
        Route::get('/create', [
            'as'         => 'course.create',
            'uses'       => 'AdminCourseController@create',
            'middleware' => 'can:course-add'
        ]);
        Route::post('/store', [
            'as'   => 'course.store',
            'uses' => 'AdminCourseController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'         => 'course.edit',
            'uses'       => 'AdminCourseController@edit',
            'middleware' => 'can:course-update'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'course.update',
            'uses' => 'AdminCourseController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'         => 'course.delete',
            'uses'       => 'AdminCourseController@delete',
            'middleware' => 'can:course-delete'
        ]);
        Route::get('/action/{id}', [
            'as'   => 'course.action',
            'uses' => 'AdminCourseController@action'
        ]);
        Route::post('/store/price', [
            'as'   => 'course.storePrice',
            'uses' => 'AdminCourseController@storePrice'
        ]);
        Route::post('/update/price/{id}', [
            'as'   => 'course.updatePrice',
            'uses' => 'AdminCourseController@updatePrice'
        ]);
    });
    Route::prefix('classroom')->group(function () {
        Route::get('/', [
            'as'         => 'classroom.index',
            'uses'       => 'AdminClassroomController@index',
            'middleware' => 'can:classroom-list'
        ]);
        Route::get('/create', [
            'as'         => 'classroom.create',
            'uses'       => 'AdminClassroomController@create',
            'middleware' => 'can:classroom-add',
        ]);
        Route::post('/store', [
            'as'   => 'classroom.store',
            'uses' => 'AdminClassroomController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'         => 'classroom.edit',
            'uses'       => 'AdminClassroomController@edit',
            'middleware' => 'can:classroom-update'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'classroom.update',
            'uses' => 'AdminClassroomController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'         => 'classroom.delete',
            'uses'       => 'AdminClassroomController@delete',
            'middleware' => 'can:classroom-delete'
        ]);
        Route::get('/action/{id}', [
            'as'   => 'classroom.action',
            'uses' => 'AdminClassroomController@action'
        ]);
    });
    Route::prefix('student')->group(function () {
        Route::get('/', [
            'as'         => 'student.index',
            'uses'       => 'AdminStudentController@index',
            'middleware' => 'can:student-list'
        ]);
        Route::get('/create', [
            'as'         => 'student.create',
            'uses'       => 'AdminStudentController@create',
            'middleware' => 'can:student-add'
        ]);
        Route::post('/store', [
            'as'   => 'student.store',
            'uses' => 'AdminStudentController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'         => 'student.edit',
            'uses'       => 'AdminStudentController@edit',
            'middleware' => 'can:student-update'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'student.update',
            'uses' => 'AdminStudentController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'         => 'student.delete',
            'uses'       => 'AdminStudentController@delete',
            'middleware' => 'can:student-delete'
        ]);
        Route::get('/action/{id}', [
            'as'   => 'student.action',
            'uses' => 'AdminStudentController@action'
        ]);
        Route::get('/ajaxGetSelect', [
            'as'   => 'student.ajaxGetSelect',
            'uses' => 'AdminStudentController@ajaxGetSelect'
        ]);
        Route::post('search', [
            'as'   => 'student.search',
            'uses' => 'AdminStudentController@searchPost'
        ]);
        Route::get('/exportExcel', [
            'as'   => 'student.exportExcel',
            'uses' => 'AdminStudentController@exportIntoExcel'
        ]);
        Route::post('/importExcel', [
            'as'   => 'student.importExcel',
            'uses' => 'AdminStudentController@importIntoExcel'
        ]);
    });
    Route::prefix('schedule')->group(function () {
        Route::get('/', [
            'as'         => 'schedule.index',
            'uses'       => 'AdminScheduleController@index',
            'middleware' => 'can:schedule-list'
        ]);
        Route::get('/create', [
            'as'         => 'schedule.create',
            'uses'       => 'AdminScheduleController@create',
            'middleware' => 'can:schedule-add'
        ]);
        Route::post('/store', [
            'as'   => 'schedule.store',
            'uses' => 'AdminScheduleController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'         => 'schedule.edit',
            'uses'       => 'AdminScheduleController@edit',
            'middleware' => 'can:schedule-update'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'schedule.update',
            'uses' => 'AdminScheduleController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'         => 'schedule.delete',
            'uses'       => 'AdminScheduleController@delete',
            'middleware' => 'can:schedule-delete'
        ]);
        Route::get('/ajaxGetSelect', [
            'as'   => 'schedule.ajaxGetSelect',
            'uses' => 'AdminScheduleController@ajaxGetSelect'
        ]);
    });
    Route::prefix('role')->group(function () {
        Route::get('/', [
            'as'   => 'role.index',
            'uses' => 'AdminRoleController@index',
            'middleware' => 'can:role-list'
        ]);
        Route::get('/create', [
            'as'   => 'role.create',
            'uses' => 'AdminRoleController@create',
            'middleware' => 'can:role-add'
        ]);
        Route::post('/store', [
            'as'   => 'role.store',
            'uses' => 'AdminRoleController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'role.edit',
            'uses' => 'AdminRoleController@edit',
            'middleware' => 'can:role-update'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'role.update',
            'uses' => 'AdminRoleController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'         => 'role.delete',
            'uses'       => 'AdminRoleController@delete',
            'middleware' => 'can:role-delete'
        ]);
    });
    Route::prefix('permission')->group(function () {
        Route::get('/', [
            'as'         => 'permission.index',
            'uses'       => 'AdminPermissionController@index',
            'middleware' => 'can:permission-list'
        ]);
        Route::post('/store', [
            'as'   => 'permission.store',
            'uses' => 'AdminPermissionController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'         => 'permission.edit',
            'uses'       => 'AdminPermissionController@edit',
            'middleware' => 'can:permission-update'
        ]);
        Route::post('/update/{id}', [
            'as'   => 'permission.update',
            'uses' => 'AdminPermissionController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'         => 'permission.delete',
            'uses'       => 'AdminPermissionController@delete',
            'middleware' => 'can:permission-delete'
        ]);
    });
    Route::prefix('recruitment')->group(function () {
        Route::get('/', [
            'as'   => 'recruitment.index',
            'uses' => 'AdminRecruitmentController@index',
        ]);
        Route::get('/create', [
            'as'   => 'recruitment.create',
            'uses' => 'AdminRecruitmentController@create',
        ]);
        Route::post('/store', [
            'as'   => 'recruitment.store',
            'uses' => 'AdminRecruitmentController@store',
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'recruitment.edit',
            'uses' => 'AdminRecruitmentController@edit',
        ]);
        Route::post('/update/{id}', [
            'as'   => 'recruitment.update',
            'uses' => 'AdminRecruitmentController@update',
        ]);
        Route::get('/delete/{id}', [
            'as'   => 'recruitment.delete',
            'uses' => 'AdminRecruitmentController@delete',
        ]);
        Route::get('/action/{id}', [
            'as'   => 'recruitment.action',
            'uses' => 'AdminRecruitmentController@action',
        ]);
    });
    Route::prefix('contact')->group(function () {
        Route::get('/', [
            'as'   => 'contact.index',
            'uses' => 'AdminContactController@index',
        ]);
        Route::get('/action/{id}', [
            'as'   => 'contact.action',
            'uses' => 'AdminContactController@action',
        ]);
        Route::get('/viewDetail/{id}', [
            'as'   => 'contact.detail',
            'uses' => 'AdminContactController@detail',
        ]);
    });
    Route::prefix('news')->group(function () {
        Route::get('/', [
            'as'   => 'news.index',
            'uses' => 'AdminNewsController@index',
        ]);
        Route::get('/create', [
            'as'   => 'news.create',
            'uses' => 'AdminNewsController@create',
        ]);
        Route::post('/store', [
            'as'   => 'news.store',
            'uses' => 'AdminNewsController@store',
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'news.edit',
            'uses' => 'AdminNewsController@edit',
        ]);
        Route::post('/update/{id}', [
            'as'   => 'news.update',
            'uses' => 'AdminNewsController@update',
        ]);
        Route::get('/delete/{id}', [
            'as'   => 'news.delete',
            'uses' => 'AdminNewsController@delete',
        ]);
        Route::get('/news/{id}', [
            'as'   => 'news.action',
            'uses' => 'AdminNewsController@action',
        ]);
    });
    Route::prefix('room')->group(function () {
        Route::get('/', [
            'as'   => 'room.index',
            'uses' => 'AdminRoomController@index',
        ]);
        Route::get('/create', [
            'as'   => 'room.create',
            'uses' => 'AdminRoomController@create',
        ]);
        Route::post('/store', [
            'as'   => 'room.store',
            'uses' => 'AdminRoomController@store',
        ]);
        Route::get('/edit/{id}', [
            'as'   => 'room.edit',
            'uses' => 'AdminRoomController@edit',
        ]);
        Route::post('/update/{id}', [
            'as'   => 'room.update',
            'uses' => 'AdminRoomController@update',
        ]);
        Route::get('/delete/{id}', [
            'as'   => 'room.delete',
            'uses' => 'AdminRoomController@delete',
        ]);
        Route::get('/action/{id}', [
            'as'   => 'room.action',
            'uses' => 'AdminRoomController@action',
        ]);
    });
    Route::prefix('payment')->group(function () {
        Route::get('/', [
            'as'   => 'payment.index',
            'uses' => 'AdminPaymentController@index',
        ]);
        Route::get('search/classroom', [
            'as'   => 'payment.search.classroom',
            'uses' => 'AdminPaymentController@searchClassroom'
        ]);
        Route::post('search/name', [
            'as'   => 'payment.search.name',
            'uses' => 'AdminPaymentController@searchName'
        ]);
    });
});

