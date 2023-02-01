<?php
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {
    include ('auth.php');
    include('admin/admin.php');
});
