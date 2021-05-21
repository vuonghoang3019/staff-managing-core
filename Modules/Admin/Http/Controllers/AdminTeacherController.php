<?php

namespace Modules\Admin\Http\Controllers;

use App\Exports\TeacherExport;
use App\Models\Grade;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Http\Requests\TeacherRequestAdd;
use Modules\Admin\Traits\DeleteTrait;
use Modules\Admin\Traits\StorageImageTrait;

class AdminTeacherController extends Controller
{
    use StorageImageTrait;
    use DeleteTrait;

    private $user;
    private $grade;
    private $schedule;
    public function __construct(User $user, Grade $grade, Schedule $schedule)
    {
        $this->user = $user;
        $this->grade = $grade;
        $this->schedule = $schedule;
    }

    public function index()
    {
        $teachers = $this->user->newQuery()->with(['grade','role'])->orderBy('id', 'desc')->paginate(5);
        return view('admin::teacher.index', compact('teachers'));
    }

    public function create()
    {
        $grades = $this->grade->get();
        return view('admin::teacher.add', compact('grades'));
    }

    public function store(TeacherRequestAdd $request)
    {
        $this->user->name = $request->name;
        $this->user->code = $request->code;
        $this->user->email = $request->email;
        $this->user->password = Hash::make($request->password);
        $userUpload = $this->storageTraitUpload($request, 'image_path', 'teacher');
        if (!empty($userUpload)) {
            $this->user->image_name = $userUpload['file_name'];
            $this->user->image_path = $userUpload['file_path'];
        }
        $this->user->save();
        $this->user->grade()->attach($request->grade_id);
        $this->user->role()->attach(Role::where('name','Teacher')->first());
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
        $grades = $this->grade->get();
        $teacherEdit = $this->user->find($id);
        $teacherGrade = $teacherEdit->grade;
        return view('admin::teacher.edit', compact('teacherEdit', 'grades', 'teacherGrade'));
    }

    public function update(TeacherRequestAdd $request, $id)
    {
        $teacherUpdate = $this->user->find($id);
        $teacherUpdate->name = $request->name;
        $teacherUpdate->code = $request->code;
        $teacherUpdate->email = $request->email;
        $teacherUpdate->password = Hash::make($request->password);
        $dataUpload = $this->fileName($request, 'image_path');
        if ($dataUpload == null) {
//            return redirect()->back()->with('error','Thiếu ảnh');
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
            $teacherUpdate = $this->user->find($id);
            unlink(substr($teacherUpdate->image_path, 1));
            return $this->deleteModelTrait($id, $this->user);
        }
    }

    public function exportIntoExcel()
    {
        return Excel::download(new TeacherExport, 'teacher.xlsx');
    }

}
