<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Http\Requests\TeacherRequestAdd;
use Modules\Admin\Traits\DeleteTrait;
use Modules\Admin\Traits\StorageImageTrait;


class AdminTeacherController extends Controller
{
    use StorageImageTrait;
    use DeleteTrait;

    private $teacher;
    private $grade;

    public function __construct(Teacher $teacher, Grade $grade)
    {
        $this->teacher = $teacher;
        $this->grade = $grade;
    }

    public function index()
    {
        $teachers = $this->teacher->newQuery()->with(['grade'])->orderBy('id', 'desc')->paginate(5);
        return view('admin::teacher.index', compact('teachers'));
    }

    public function create()
    {
        $grades = $this->grade->get();
        return view('admin::teacher.add', compact('grades'));
    }

    public function store(TeacherRequestAdd $request)
    {
        $this->teacher->name = $request->name;
        $this->teacher->code = $request->code;
        $this->teacher->email = $request->email;
        $this->teacher->password = $request->password;
        $userUpload = $this->storageTraitUpload($request, 'image_path', 'teacher');
        if (!empty($userUpload)) {
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
        $teacherGrade = $teacherEdit->grade;
        return view('admin::teacher.edit', compact('teacherEdit', 'grades', 'teacherGrade'));
    }

    public function update(Request $request, $id)
    {
        $teacherUpdate = $this->teacher->find($id);
        $teacherUpdate->name = $request->name;
        $teacherUpdate->code = $request->code;
        $teacherUpdate->email = $request->email;
        $teacherUpdate->password = $request->password;
        $dataUpload = $this->fileName($request, 'image_path');
        if ($dataUpload == null) {

        }
        else if ($teacherUpdate->image_name != $dataUpload['file_name'])
        {
            unlink(substr($teacherUpdate->image_path, 1));
            $userUpload = $this->storageTraitUpload($request, 'image_path', 'teacher');
            if (!empty($userUpload)) {
                $teacherUpdate->image_name = $userUpload['file_name'];
                $teacherUpdate->image_path = $userUpload['file_path'];
            }
        }
        $teacherUpdate->save();
        $teacherUpdate->grade()->sync($request->grade_id);
        return redirect()->back();
    }

    public function delete($id)
    {
        $teacherUpdate = $this->teacher->find($id);
        unlink(substr($teacherUpdate->image_path, 1));
        return $this->deleteModelTrait($id, $this->teacher);
    }
}
