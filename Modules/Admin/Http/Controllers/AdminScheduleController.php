<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminScheduleController extends Controller
{

    public function index()
    {
        return view('admin::schedule.index');
    }

    public function create()
    {
        return view('admin::schedule.add');
    }

}
