<?php

namespace Modules\Admin\Http\Controllers;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Http\Requests\ImportExcelRequest;
use Modules\Admin\Http\Requests\StudentRequestAdd;
use Modules\Admin\Http\Requests\update\StudentRequestUpdate;
use Modules\Admin\Traits\DeleteTrait;
use Modules\Admin\Traits\StorageImageTrait;

class AdminStudentController extends FrontendController {
    private $classroom;
    private $student;
    use DeleteTrait;
    use StorageImageTrait;

    public function __construct(Student $student, Classroom $classroom)
    {
        parent::__construct();
        $this->student = $student;
        $this->classroom = $classroom;
    }

    public function index()
    {
        $classrooms = $this->classroom->get();
        $students = $this->student->newQuery()->with(['classroom'])->orderBy('id', 'asc')->paginate(5);
        return view('admin::student.index', compact('students', 'classrooms'));
    }

    public function create()
    {
        $classrooms = $this->classroom->get();
        return view('admin::student.add', compact('classrooms'));
    }

    public function store(StudentRequestAdd $request)
    {
        $this->student->code = $request->code;
        $this->student->name = $request->name;
        $this->student->birthday = $request->birthday;
        $this->student->sex = $request->sex;
        $this->student->nation = $request->nation;
        $this->student->classroom_id = $request->classroom_id;
        $this->student->email = $request->email;
        $this->student->password = Hash::make($request->password);
        $this->student->phone = $request->phone;
        $studentUpload = $this->storageTraitUpload($request, 'image_path', 'student');
        if (!empty($studentUpload)) {
            $this->student->image_path = $studentUpload['file_path'];
            $this->student->image_name = $studentUpload['file_name'];
        }
        $this->student->save();
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $studentEdit = $this->student->find($id);
        $classrooms = $this->classroom->get();
        return view('admin::student.edit', compact('classrooms', 'studentEdit'));
    }

    public function update(StudentRequestUpdate $request, $id)
    {
        $studentUpdate = $this->student->find($id);
        $studentUpdate->code = $request->code;
        $studentUpdate->name = $request->name;
        $studentUpdate->birthday = $request->birthday;
        $studentUpdate->sex = $request->sex;
        $studentUpdate->nation = $request->nation;
        $studentUpdate->email = $request->email;
        $studentUpdate->classroom_id = $request->classroom_id;
        $this->student->password = Hash::make($request->password);
        $studentUpdate->phone = $request->phone;
        $studentUpdate->status = 1;
        $studentUpload = $this->storageTraitUpload($request, 'image_path', 'student');
        if (!empty($studentUpload)) {
            unlink(substr($studentUpdate->image_path, 1));
            $studentUpdate->image_path = $studentUpload['file_path'];
            $studentUpdate->image_name = $studentUpload['file_name'];
        }
        $studentUpdate->save();
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->student);
    }

    public function action($id)
    {
        $studentAction = $this->student->find($id);
        $studentAction->status = $studentAction->status ? 0 : 1;
        $studentAction->save();
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }

    public function ajaxGetSelect(Request $request)
    {
        if ($request->get('id')) {
            $id = $request->get('id');
            $students = $this->student->with(['classroom'])
                ->where('classroom_id', $id)
                ->get();
            $output = '';
            foreach ($students as $student) {
                $output .= '<tr>
                    <td>' . $student->id . '</td>
                    <td>' . $student->name . '</td>
                     <td>' . $student->email . '</td>
                     <td>' . $student->code . '</td>
                     <td><ul><li>' . $student->birthday . '</li><li>' . $student->nation . '</li><li>' . $student->phone . '</li></ul></td>
                       <td>' . $student->classroom->name . '</td>
                       <td><a class="' . $student->getStatus($student->status)['class'] . '" href="' . route('student.action', ['id' => $student->id]) . '">' . $student->getStatus($student->status)['name'] . '</a></td>
                          <td><a class="btn btn-default" href="' . route('student.edit', ['id' => $student->id]) . '">Edit</a></td>
                          <td><a class="btn btn-danger action-delete" href="#" data-url="' . route('student.delete', ['id' => $student->id]) . '">Delete</a></td>
                    </tr>';
            }

            return response($output);
        }
    }


    public function searchPost(Request $request)
    {
        if ($request->get('searchResult')) {
            $query = $request->get('searchResult');
            $students = $this->student->with('classroom')
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('nation', 'like', '%' . $query . '%')->get();
            $output = '';
            foreach ($students as $student) {
                $output .= '<tr>
                    <td>' . $student->id . '</td>
                    <td>' . $student->name . '</td>
                     <td>' . $student->email . '</td>
                     <td>' . $student->code . '</td>
                     <td><ul><li>' . $student->birthday . '</li><li>' . $student->nation . '</li><li>' . $student->phone . '</li></ul></td>
                       <td>' . $student->classroom->name . '</td>
                       <td><a class="' . $student->getStatus($student->status)['class'] . '" href="' . route('student.action', ['id' => $student->id]) . '">' . $student->getStatus($student->status)['name'] . '</a></td>
                          <td><a class="btn btn-default" href="' . route('student.edit', ['id' => $student->id]) . '">Edit</a></td>
                          <td><a class="btn btn-danger action-delete" href="#" data-url="' . route('student.delete', ['id' => $student->id]) . '">Delete</a></td>
                    </tr>';
            }

            return response($output);
        } else {
            $students = $this->student->newQuery()->with(['classroom'])->get();
            return $students;
        }
    }

    public function exportIntoExcel()
    {
        return Excel::download(new StudentExport, 'student.xlsx');
    }

    public function importIntoExcel(ImportExcelRequest $request)
    {
        $file = $request->file('file');
        if ($file) {
            Excel::import(new StudentImport, $file);
            return redirect()->back()->with('success', 'Import Thành công');
        } else {
            abort(500);
        }

    }
}
