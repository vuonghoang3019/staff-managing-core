<?php

namespace Modules\Admin\Http\Controllers;

use App\Exports\TeacherExport;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Http\Requests\TeacherRequestAdd;
use Modules\Admin\Traits\DeleteTrait;
use Modules\Admin\Traits\StorageImageTrait;

class AdminTeacherController extends Controller
{
    use StorageImageTrait;
    use DeleteTrait;

    private $teacher;
    private $grade;
    private $schedule;
    public function __construct(Teacher $teacher, Grade $grade, Schedule $schedule)
    {
        $this->teacher = $teacher;
        $this->grade = $grade;
        $this->schedule = $schedule;
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
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
        $grades = $this->grade->get();
        $teacherEdit = $this->teacher->find($id);
        $teacherGrade = $teacherEdit->grade;
        return view('admin::teacher.edit', compact('teacherEdit', 'grades', 'teacherGrade'));
    }

    public function update(TeacherRequestAdd $request, $id)
    {
        $teacherUpdate = $this->teacher->find($id);
        $teacherUpdate->name = $request->name;
        $teacherUpdate->code = $request->code;
        $teacherUpdate->email = $request->email;
        $teacherUpdate->password = $request->password;
        $dataUpload = $this->fileName($request, 'image_path');
        if ($dataUpload == null) {
            return redirect()->back()->with('error','Thiếu ảnh');
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
        return redirect()->back()->with('success','Cập nhật thành công');
    }

    public function delete($id)
    {
        $countTeacher = $this->schedule->countTeacher($id);
        if ($countTeacher > 0){
            return response()->json([
                'code' => 201,
                'message' => 'success'
            ],201);
        }
        else
        {
            $teacherUpdate = $this->teacher->find($id);
            unlink(substr($teacherUpdate->image_path, 1));
            return $this->deleteModelTrait($id, $this->teacher);
        }
    }

    public function exportIntoExcel()
    {
        return Excel::download(new TeacherExport, 'teacher.xlsx');
    }

}
