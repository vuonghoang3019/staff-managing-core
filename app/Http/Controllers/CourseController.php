<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends FrontendController
{
    private $course;
    private $classroom;

    public function __construct(Course $course, Classroom $classroom)
    {
        parent::__construct();
        $this->course = $course;
        $this->classroom = $classroom;
    }

    public function index()
    {
        $courses = $this->course->paginate(4);
        $classroom = $this->classroom->newQuery()->with(['course','student'])->get();
        dd($classroom);
        return view('course', compact('courses'));
    }

    public function detail($id)
    {
        $courseDetail = $this->course->findOrFail($id);
        return view('courseDetail', compact('courseDetail'));
    }
}
