<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['CheckLogin']], function () {
    Route::get('/', [
        'as'         => 'dashboard',
        'uses'       => 'AdminController@index',
    ]);

    include ('slider.php');

    include ('about.php');

    include ('grade.php');

    include ('teacher.php');

    include ('course.php');

    include ('classroom.php');

    include ('student.php');

    include ('schedule.php');

    include ('role.php');

    include ('recruitment.php');

    include ('payment.php');

    include ('contact.php');

    include ('news.php');

    include ('room.php');

    include ('permission.php');
});
