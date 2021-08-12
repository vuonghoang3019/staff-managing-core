<?php

namespace Backend\Http\Controllers;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Models\Classroom;
use App\Models\Student;
use Backend\Repositories\Student\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Backend\Http\Requests\ImportExcelRequest;
use Backend\Http\Requests\Student\StudentRequestAdd;
use Backend\Http\Requests\Student\StudentRequestUpdate;
use Backend\Traits\DeleteTrait;
use Backend\Traits\StorageImageTrait;

class AdminStudentController extends FrontendController
{

    private $studentRepo;

    use DeleteTrait;

    use StorageImageTrait;

    public function __construct(StudentRepositoryInterface $studentRepo)
    {
        parent::__construct();
        $this->studentRepo = $studentRepo;
    }

    public function index()
    {
        $classrooms = $this->studentRepo->getClassrooms();
        $students = $this->studentRepo->paginate();
        return view('backend::student.index', compact('students', 'classrooms'));
    }

    public function create()
    {
        $classrooms = $this->studentRepo->getClassrooms();
        return view('backend::student.create', compact('classrooms'));
    }

    public function store(StudentRequestAdd $request)
    {
        $dataStudent = [
            'code'         => $request->code,
            'name'         => $request->name,
            'birthday'     => $request->birthday,
            'sex'          => $request->sex,
            'nation'       => $request->nation,
            'classroom_id' => $request->classroom_id,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'phone'        => $request->phone
        ];
        $studentUpload = $this->storageTraitUpload($request, 'image_path', 'student');
        if (!empty($studentUpload)) {
            $dataStudent['image_path'] = $studentUpload['file_path'];
            $dataStudent['image_name'] = $studentUpload['file_name'];
        }
        $this->studentRepo->create($dataStudent);
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $studentEdit = $this->studentRepo->detail($id);
        $classrooms = $this->studentRepo->getClassrooms();
        return view('backend::student.edit', compact('classrooms', 'studentEdit'));
    }

    public function update(StudentRequestUpdate $request, $id)
    {
        $studentUpdate = $this->studentRepo->detail($id);
        $dataStudent = [
            'code'         => $request->code,
            'name'         => $request->name,
            'birthday'     => $request->birthday,
            'sex'          => $request->sex,
            'nation'       => $request->nation,
            'classroom_id' => $request->classroom_id,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'phone'        => $request->phone,
            'is_active'    => 1
        ];
        $studentUpload = $this->storageTraitUpload($request, 'image_path', 'student');
        if (!empty($studentUpload)) {
            unlink(substr($studentUpdate->image_path, 1));
            $dataStudent['image_path'] = $studentUpload['file_path'];
            $dataStudent['image_name'] = $studentUpload['file_name'];
        }
        $this->studentRepo->update($id, $dataStudent);
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->studentRepo->delete($id);
    }

    public function action($id)
    {
        $studentAction = $this->studentRepo->detail($id);
        $studentAction->is_active = $studentAction->is_active ? 0 : 1;
        $studentAction->save();
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }

    public function ajaxGetSelect(Request $request)
    {
        return $this->studentRepo->search($request);
    }

    public function searchPost(Request $request)
    {
        return $this->studentRepo->search($request);
    }

    public function exportIntoExcel()
    {
//        return Excel::download(new StudentExport, 'students.xlsx');
    }

    public function importIntoExcel(ImportExcelRequest $request)
    {
//        $file = $request->file('file');
//        if ($file) {
//            Excel::import(new StudentImport, $file);
//            return redirect()->back()->with('success', 'Import Thành công');
//        } else {
//            abort(500);
//        }
    }
}
