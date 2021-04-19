<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\CourseRequestAdd;

class AdminCourseController extends Controller
{
    private $grade;
    private $course;
    public function __construct(Course $course,Grade $grade)
    {
        $this->course = $course;
        $this->grade = $grade;
    }

    public function index()
    {
        $courses = $this->course->newQuery()->with(['course_grade'])->orderBy('id','desc')->get();
        return view('admin::course.index',compact('courses'));
    }
    public function create()
    {
        $grades = $this->grade->get();
        return view('admin::course.add',compact('grades'));
    }
    public function store(CourseRequestAdd $request)
    {
        $this->course->name = $request->name;
        $this->course->description = $request->description;
        $this->course->save();
        $this->course->course_grade()->attach($request->grade_id);
        return redirect()->back();
    }
    public function edit($id)
    {
        $grades = $this->grade->get();
        $productEdit = $this->course->find($id);
        $productGrade = $productEdit->course_grade;
        return view('admin::course.edit',compact('productEdit','grades','productGrade'));

    }
    public function delete($id)
    {

    }
    public function action($id)
    {
        $productEdit = $this->course->find($id);
        $productEdit->status = $productEdit->status ? 0 : 1;
        $productEdit->save();
        return redirect()->back();
    }
}
