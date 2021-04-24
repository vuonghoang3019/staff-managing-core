<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class AdminStudentController extends Controller
{
    private $classroom;
    private $student;
    public function __construct(Student $student, Classroom $classroom)
    {
        $this->student = $student;
        $this->classroom = $classroom;
    }

    public function index()
    {
        return view('admin::student.index');
    }
    public function create()
    {
        $classrooms = $this->classroom->get();
        return view('admin::student.add',compact('classrooms'));
    }
    public function store(Request $request)
    {
        $this->student->code = $request->code;
        $this->student->name = $request->name;
        $this->student->birthday = $request->birthday;
        $this->student->sex = $request->sex;
        $this->student->nation = $request->nation;
        $this->student->classroom_id = $request->classroom_id;
        $this->student->save();
        return redirect()->back();
    }
}
