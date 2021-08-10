<?php

namespace Backend\Http\Controllers;

use App\Exports\TeacherExport;
use App\Models\Grade;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Backend\Http\Requests\Teacher\TeacherRequestAdd;
use Backend\Http\Requests\Teacher\TeacherRequestUpdate;
use Backend\Traits\DeleteTrait;
use Backend\Traits\StorageImageTrait;

class AdminTeacherController extends FrontendController {

    use StorageImageTrait;

    use DeleteTrait;

    private $user;

    private $grade;

    private $schedule;

    private $role;

    public function __construct(User $user, Grade $grade, Schedule $schedule, Role $role)
    {
        parent::__construct();
        $this->user = $user;
        $this->grade = $grade;
        $this->schedule = $schedule;
        $this->role = $role;
    }

    public function index()
    {
        $teachers = $this->user->newQuery()->with(['grades', 'roles'])->orderBy('id', 'asc')->paginate(5);
        return view('backend::teacher.index', compact('teachers'));
    }

    public function create()
    {
        $grades = $this->grade->get();
        return view('backend::teacher.create', compact('grades'));
    }

    public function store(TeacherRequestAdd $request)
    {
        $this->user->name = $request->name;
        $this->user->code = $request->code;
        $this->user->email = $request->email;
        $this->user->password = Hash::make($request->password);
        $this->user->description = $request->description;
        $this->user->description = $request->is_check;
        $userUpload = $this->storageTraitUpload($request, 'image_path', 'teacher');
        if (!empty($userUpload)) {
            $this->user->image_name = $userUpload['file_name'];
            $this->user->image_path = $userUpload['file_path'];
        }
        $this->user->save();
        $this->user->grades()->attach($request->grade_id);
        $this->user->roles()->attach(Role::where('name', 'Teacher')->first());
        if ($this->user->id)
        {
            $email = $this->user->email;
            Mail::send('admin::auth.email.verifyAccountAdmin',  array('email'=>$request->email, 'password' => $request->password), function ($message) use ($email) {
                $message->to($email, 'Active Account')->subject('Kích hoạt email');
            });
        }
        return redirect()->back()->with('success', 'Thêm mới và gửi email thành công');
    }

    public function edit($id)
    {
        $grades = $this->grade->get();
        $teacherEdit = $this->user->find($id);
        $teacherGrade = $teacherEdit->grades;
        $roles = $this->role->get();
        $teacherRole = $teacherEdit->roles;
        return view('backend::teacher.edit', compact('teacherEdit', 'grades', 'teacherGrade', 'roles', 'teacherRole'));
    }

    public function update(TeacherRequestUpdate $request, $id)
    {
        $teacherUpdate = $this->user->find($id);
        $teacherUpdate->name = $request->name;
        $teacherUpdate->code = $request->code;
        $teacherUpdate->email = $request->email;
        $teacherUpdate->description = $request->description;
        $teacherUpdate->is_check = $request->is_check == null ? 0 : 1;
        $teacherUpdate->password = Hash::make($request->password);
        $userUpload = $this->storageTraitUpload($request, 'image_path', 'teacher');
        if (!empty($userUpload)) {
            unlink(substr($teacherUpdate->image_path, 1));
            $teacherUpdate->image_name = $userUpload['file_name'];
            $teacherUpdate->image_path = $userUpload['file_path'];
        }
        $teacherUpdate->save();
        $teacherUpdate->grades()->sync($request->grade_id);
        $teacherUpdate->roles()->sync($request->role_id);
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $countTeacher = $this->schedule->countTeacher($id);
        if ($countTeacher > 0) {
            return response()->json([
                'code'    => 201,
                'message' => 'success'
            ], 201);
        } else {
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
