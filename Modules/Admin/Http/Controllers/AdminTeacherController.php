<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Http\Requests\TeacherRequestAdd;
use Modules\Admin\Traits\DeleteTrait;
use Modules\Admin\Traits\StorageImageTrait;

class AdminTeacherController extends Controller
{
    use StorageImageTrait;
    use DeleteTrait;
    private $teacher;
    private $grade;

    public function __construct(Teacher $teacher,Grade $grade)
    {
        $this->teacher = $teacher;
        $this->grade = $grade;
    }

    public function index()
    {
        $teachers = $this->teacher->newQuery()->with(['grade'])->orderBy('id','desc')->get();
        return view('admin::teacher.index',compact('teachers'));
    }
    public function create()
    {
        $grades = $this->grade->get();
        return view('admin::teacher.add',compact('grades'));
    }
    public function store(TeacherRequestAdd $request)
    {
        $this->teacher->name = $request->name;
        $this->teacher->code = $request->code;
        $this->teacher->email = $request->email;
        $this->teacher->password = $request->password;
        $userUpload = $this->storageTraitUpload($request,'image_path','teacher');
        if (!empty($userUpload))
        {
            $this->teacher->image_name = $userUpload['file_name'];
            $this->teacher->image_path = $userUpload['file_path'];
        }
        $this->teacher->save();
        $this->teacher->grade()->attach($request->grade_id);
        return redirect()->back();
    }
    public function edit($id)
    {
        $grades = $this->grade->get();
        $teacherEdit = $this->teacher->find($id);
        $teacherGrade= $teacherEdit->grade;
        return view('admin::teacher.edit',compact('teacherEdit','grades','teacherGrade'));
    }
    public function update(Request $request ,$id)
    {
        $userUpload = $this->storageTraitUpload($request,'image_path','teacher');
        dd($userUpload);

    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->teacher);
    }
}
