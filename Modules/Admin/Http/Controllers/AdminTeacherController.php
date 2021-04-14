<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminTeacherController extends Controller
{
    private $teacher;
    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function index()
    {
        $teachers = $this->teacher->orderBy('id','desc')->paginate(5);
        return view('admin::teacher.index',compact('teachers'));
    }
    public function create()
    {
        return view('admin::teacher.add');
    }
}
