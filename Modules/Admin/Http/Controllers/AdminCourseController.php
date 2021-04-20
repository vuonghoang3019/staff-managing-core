<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\CourseRequestAdd;
use Modules\Admin\Traits\DeleteTrait;

class AdminCourseController extends Controller
{
    private $grade;
    private $course;
    use DeleteTrait;
    public function __construct(Course $course,Grade $grade)
    {
        $this->course = $course;
        $this->grade = $grade;
    }

    public function index()
    {
        $courses = $this->course->newQuery()->with(['course_grade'])->orderBy('id','desc')->paginate(5);
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
        $courseEdit = $this->course->find($id);
        $courseGrade = $courseEdit->course_grade;
        return view('admin::course.edit',compact('courseEdit','grades','courseGrade'));

    }
    public function update(Request $request, $id)
    {
        $courseEdit = $this->course->find($id);
        $courseEdit->name = $request->name;
        $courseEdit->description = $request->description;
        $courseEdit->save();
        $courseEdit->course_grade()->sync($request->grade_id);
        return redirect()->back();
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->course);
    }
    public function action($id)
    {
        $courseEdit = $this->course->find($id);
        $courseEdit->status = $courseEdit->status ? 0 : 1;
        $courseEdit->save();
        return redirect()->back();
    }
}
