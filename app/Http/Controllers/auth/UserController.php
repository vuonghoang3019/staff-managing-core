<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class UserController extends FrontendController
{
    private $student;
    private $course;

    public function __construct(Student $student, Course $course)
    {
        parent::__construct();
        $this->student = $student;
        $this->course = $course;
    }

    public function index($id)
    {
        $studentDetail = $this->student->findOrFail($id);
        $studentClassroom = $studentDetail->classroom;
        $courses = $this->course->newQuery()->with('classroom')->get();
        return view('auth.userInfo',compact('studentDetail','studentClassroom','courses'));
    }
}
