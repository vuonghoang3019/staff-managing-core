<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\CourseRequestAdd;
use Modules\Admin\Traits\DeleteTrait;
use Modules\Admin\Traits\StorageImageTrait;

class AdminCourseController extends FrontendController
{
    use StorageImageTrait;
    private $grade;
    private $course;
    use DeleteTrait;
    public function __construct(Course $course,Grade $grade)
    {
        parent::__construct();
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
        $courseUpload = $this->storageTraitUpload($request, 'image_path', 'course');
        if (!empty($courseUpload)) {
            $this->course->image_name = $courseUpload['file_name'];
            $this->course->image_path = $courseUpload['file_path'];
        }
        $this->course->save();
        $this->course->course_grade()->attach($request->grade_id);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $grades = $this->grade->get();
        $courseEdit = $this->course->find($id);
        $courseGrade = $courseEdit->course_grade;
        return view('admin::course.edit',compact('courseEdit','grades','courseGrade'));

    }
    public function update(CourseRequestAdd $request, $id)
    {
        $courseEdit = $this->course->find($id);
        $courseEdit->name = $request->name;
        $courseEdit->description = $request->description;
        $courseUpload = $this->storageTraitUpload($request, 'image_path', 'course');
        if (!empty($courseUpload)) {
            unlink(substr($courseEdit->image_path, 1));
            $courseEdit->image_name = $courseUpload['file_name'];
            $courseEdit->image_path = $courseUpload['file_path'];
        }
        $courseEdit->save();
        $courseEdit->course_grade()->sync($request->grade_id);
        return redirect()->back()->with('success','Cập nhật thành công');
    }
    public function delete($id)
    {
        $courseEdit = $this->course->find($id);
        unlink(substr($courseEdit->image_path, 1));
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
