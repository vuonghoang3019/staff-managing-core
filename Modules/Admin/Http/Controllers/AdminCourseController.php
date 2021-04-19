<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminCourseController extends Controller
{
    public function index()
    {
        return view('admin::course.index');
    }
    public function create()
    {
        return view('admin::course.add');
    }
}
