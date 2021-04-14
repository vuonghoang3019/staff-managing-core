<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\TeacherRequestAdd;

class AdminTeacherController extends Controller
{
    private $teacher;
    private $grade;
    public function __construct(Teacher $teacher,Grade $grade)
    {
        $this->teacher = $teacher;
        $this->grade = $grade;
    }

    public function index()
    {
        $teachers = $this->teacher->orderBy('id','desc')->paginate(5);
        return view('admin::teacher.index',compact('teachers'));
    }
    public function create()
    {
        $grades = $this->grade->get();
        return view('admin::teacher.add',compact('grades'));
    }
    public function store(TeacherRequestAdd $request)
    {

    }
}
