<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\Student\EditRequest;
use Admin\Repos\StudentRepo;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Admin\Models\Classroom;
use Admin\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Admin\Http\Requests\ImportExcelRequest;
use Admin\Http\Requests\Student\BaseRequest;
use Admin\Http\Requests\Student\UpdateRequest;
use Admin\Traits\StorageImageTrait;

class StudentController extends BaseController
{

    private $repo;

    use StorageImageTrait;

    public function __construct(StudentRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
//        $classrooms = $this->studentRepo->getClassrooms();
//        $students = $this->studentRepo->paginate();
//        return view('admin::student.index', compact('students', 'classrooms'));
    }

    public function create()
    {
//        $classrooms = $this->studentRepo->getClassrooms();
//        return view('admin::student.create', compact('classrooms'));
    }

    public function store(BaseRequest $request)
    {
        return $this->repo->baseStore($request->data());
    }

    public function edit(EditRequest $request,$id)
    {
//        $studentEdit = $this->studentRepo->detail($id);
//        $classrooms = $this->studentRepo->getClassrooms();
//        return view('admin::student.edit', compact('classrooms', 'studentEdit'));
    }

    public function update(UpdateRequest $request, $id)
    {
//        $studentUpdate = $this->studentRepo->detail($id);
//        $dataStudent = [
//            'code'         => $request->code,
//            'name'         => $request->name,
//            'birthday'     => $request->birthday,
//            'sex'          => $request->sex,
//            'nation'       => $request->nation,
//            'classroom_id' => $request->classroom_id,
//            'email'        => $request->email,
//            'password'     => Hash::make($request->password),
//            'phone'        => $request->phone,
//            'is_active'    => 1
//        ];
//        $studentUpload = $this->storageTraitUpload($request, 'image_path', 'student');
//        if (!empty($studentUpload)) {
//            unlink(substr($studentUpdate->image_path, 1));
//            $dataStudent['image_path'] = $studentUpload['file_path'];
//            $dataStudent['image_name'] = $studentUpload['file_name'];
//        }
//        $this->studentRepo->update($id, $dataStudent);
//        return redirect()->back()->with('success', 'Cập nhật thành công');

        return $this->repo->baseUpdate($request->data(), $id);
    }

    public function delete($id)
    {
        return $this->repo->baseDelete($id);
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
