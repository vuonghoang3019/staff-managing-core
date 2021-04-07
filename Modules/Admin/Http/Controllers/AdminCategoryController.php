<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('admin::category.index');
    }
}
