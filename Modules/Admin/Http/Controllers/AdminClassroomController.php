<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminClassroomController extends Controller
{
    public function index()
    {
        return view('admin::classroom.index');
    }
    public function create()
    {
        return view('admin::classroom.add');
    }
}
