<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends FrontendController
{
    private $course;
    public function __construct(Course $course)
    {
        parent::__construct();
        $this->course = $course;
    }

    public function index()
    {
        $courses = $this->course->paginate(4);
        return view('course',compact('courses'));
    }

    public function detail($id)
    {
        $courseDetail = $this->course->findOrFail($id);
        return view('courseDetail',compact('courseDetail'));
    }
}
