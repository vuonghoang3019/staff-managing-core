<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\ClassroomRequestAdd;
use Modules\Admin\Traits\DeleteTrait;

class AdminClassroomController extends FrontendController {
    private $course;
    private $classroom;
    use DeleteTrait;

    public function __construct(Classroom $classroom, Course $course)
    {
        parent::__construct();
        $this->classroom = $classroom;
        $this->course = $course;
    }

    public function index()
    {
        $classrooms = $this->classroom->newQuery()->with(['course','student'])->paginate(10);
        return view('admin::classroom.index', compact('classrooms'));
    }

    public function create()
    {
        $courses = $this->course->get();
        $classrooms = $this->classroom->newQuery()->with(['course'])->orderBy('id', 'desc')->paginate(10);
        return view('admin::classroom.add', compact('courses', 'classrooms'));
    }

    public function store(ClassroomRequestAdd $request)
    {
        $this->classroom->code = $request->code;
        $this->classroom->name = $request->name;
        $this->classroom->number = $request->number;
        $this->classroom->min = $request->min;
        $this->classroom->course_id = $request->course_id;
        $this->classroom->save();
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $classroomEdit = $this->classroom->find($id);
        $courses = $this->course->get();
        $classrooms = $this->classroom->newQuery()->with(['course'])->orderBy('id', 'desc')->paginate(10);
        return view('admin::classroom.edit', compact('courses', 'classroomEdit', 'classrooms'));
    }

    public function update(ClassroomRequestAdd $request, $id)
    {
        $classroomUpdate = $this->classroom->find($id);
        $classroomUpdate->code = $request->code;
        $classroomUpdate->name = $request->name;
        $classroomUpdate->number = $request->number;
        $classroomUpdate->min = $request->min;
        $classroomUpdate->course_id = $request->course_id;
        $classroomUpdate->save();
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->classroom);
    }

    public function action($id)
    {
        $classroomAction = $this->classroom->find($id);
        $classroomAction->status = $classroomAction->status ? 0 : 1;
        $classroomAction->save();
        return redirect()->back();
    }
}
