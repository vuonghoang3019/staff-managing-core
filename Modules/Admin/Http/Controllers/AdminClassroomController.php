<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\ClassroomRequestAdd;
use Modules\Admin\Traits\DeleteTrait;

class AdminClassroomController extends Controller
{
    private $course;
    private $classroom;
    use DeleteTrait;
    public function __construct(Classroom $classroom, Course $course)
    {
        $this->classroom = $classroom;
        $this->course = $course;
    }

    public function index()
    {
        $classrooms = $this->classroom->newQuery()->with(['course'])->paginate(5);
        return view('admin::classroom.index',compact('classrooms'));
    }
    public function create()
    {
        $courses = $this->course->get();
        return view('admin::classroom.add',compact('courses'));
    }

    public function store(ClassroomRequestAdd $request)
    {
        $this->classroom->code = $request->code;
        $this->classroom->name = $request->name;
        $this->classroom->course_id = $request->course_id;
        $this->classroom->save();
        return redirect()->back();
    }
    public function edit($id)
    {
        $classroomEdit = $this->classroom->find($id);
        $courses = $this->course->get();
        return view('admin::classroom.edit',compact('courses','classroomEdit'));
    }
    public function update(ClassroomRequestAdd $request ,$id)
    {
        $classroomUpdate = $this->classroom->find($id);
        $classroomUpdate->code = $request->code;
        $classroomUpdate->name = $request->name;
        $classroomUpdate->course_id = $request->course_id;
        $classroomUpdate->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->classroom);
    }
    public function action($id)
    {
        $classroomAction = $this->classroom->find($id);
        $classroomAction->status = $classroomAction->status ? 0 : 1;
        $classroomAction->save();
        return redirect()->back();
    }
}