<?php

namespace admin\Http\Controllers;

use App\Exports\TeacherExport;
use App\Models\Role;
use admin\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use admin\Http\Requests\Teacher\TeacherRequestAdd;
use admin\Http\Requests\Teacher\TeacherRequestUpdate;
use admin\Traits\StorageImageTrait;

class AdminTeacherController extends FrontendController
{

    use StorageImageTrait;

    private $teacherRepo;

    public function __construct(TeacherRepositoryInterface $teacherRepo)
    {
        parent::__construct();
        $this->teacherRepo = $teacherRepo;
    }

    public function index()
    {
        $teachers = $this->teacherRepo->paginate();
        return view('backend::teacher.index', compact('teachers'));
    }

    public function create()
    {
        $grades = $this->teacherRepo->getGrades();
        return view('backend::teacher.create', compact('grades'));
    }

    public function store(TeacherRequestAdd $request)
    {
        $dataTeacher = [
            'name'        => $request->name,
            'code'        => $request->code,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'description' => $request->description,
            'is_check'    => $request->is_check == null ? 0 : 1
        ];
        $userUpload = $this->storageTraitUpload($request, 'image_path', 'teacher');
        if (!empty($userUpload)) {
            $dataTeacher['image_name'] = $userUpload['file_name'];
            $dataTeacher['image_path'] = $userUpload['file_path'];
        }
        $teacherAdd =  $this->teacherRepo->create($dataTeacher);
        $teacherAdd->grades()->attach($request->grade_id);
        $teacherAdd->roles()->attach(Role::where('name', 'Teacher')->first());
        if ($teacherAdd->id) {
            $email = $teacherAdd->email;
            Mail::send('backend::auth.email.verifyAccountAdmin', array('email' => $request->email, 'password' => $request->password), function ($message) use ($email) {
                $message->to($email, 'Active Account')->subject('Kích hoạt email');
            });
        }
        return redirect()->back()->with('success', 'Thêm mới và gửi email thành công');
    }

    public function edit($id)
    {
        $grades = $this->teacherRepo->getGrades();
        $teacherEdit = $this->teacherRepo->detail($id);
        $teacherGrade = $teacherEdit->grades;
        $roles = $this->teacherRepo->getRoles();
        $teacherRole = $teacherEdit->roles;
        return view('backend::teacher.edit', compact('teacherEdit', 'grades', 'teacherGrade', 'roles', 'teacherRole'));
    }

    public function update(TeacherRequestUpdate $request, $id)
    {
        $teacherUpdate = $this->teacherRepo->detail($id);
        $dataTeacher = [
            'name'        => $request->name,
            'code'        => $request->code,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'description' => $request->description,
            'is_check'    => $request->is_check == null ? 0 : 1
        ];
        $userUpload = $this->storageTraitUpload($request, 'image_path', 'teacher');
        if (!empty($userUpload)) {
            unlink(substr($teacherUpdate->image_path, 1));
            $dataTeacher['image_name'] = $userUpload['file_name'];
            $dataTeacher['image_path'] = $userUpload['file_path'];
        }
        $teacherUpdate = $this->teacherRepo->update($id, $dataTeacher);
        $teacherUpdate->grades()->sync($request->grade_id);
        $teacherUpdate->roles()->sync($request->role_id);
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->teacherRepo->delete($id);
    }

    public function exportIntoExcel()
    {
//        return Excel::download(new TeacherExport, 'teacher.xlsx');
    }

}
