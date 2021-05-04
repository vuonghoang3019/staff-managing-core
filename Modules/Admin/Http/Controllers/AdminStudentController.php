<?php

namespace Modules\Admin\Http\Controllers;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Http\Requests\ImportExcelRequest;
use Modules\Admin\Traits\DeleteTrait;

class AdminStudentController extends Controller
{
    private $classroom;
    private $student;
    use DeleteTrait;

    public function __construct(Student $student, Classroom $classroom)
    {
        $this->student = $student;
        $this->classroom = $classroom;
    }

    public function index()
    {
        $classrooms = $this->classroom->get();
        $students = $this->student->newQuery()->with(['classroom'])->paginate(5);
        return view('admin::student.index', compact('students', 'classrooms'));
    }

    public function create()
    {
        $classrooms = $this->classroom->get();
        return view('admin::student.add', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $this->student->code = $request->code;
        $this->student->name = $request->name;
        $this->student->birthday = $request->birthday;
        $this->student->sex = $request->sex;
        $this->student->nation = $request->nation;
        $this->student->classroom_id = $request->classroom_id;
        $this->student->save();
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $studentEdit = $this->student->find($id);
        $classrooms = $this->classroom->get();
        return view('admin::student.edit', compact('classrooms', 'studentEdit'));
    }

    public function update(Request $request, $id)
    {
        $studentUpdate = $this->student->find($id);
        $studentUpdate->code = $request->code;
        $studentUpdate->name = $request->name;
        $studentUpdate->birthday = $request->birthday;
        $studentUpdate->sex = $request->sex;
        $studentUpdate->nation = $request->nation;
        $studentUpdate->classroom_id = $request->classroom_id;
        $studentUpdate->save();
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->student);
    }

    public function ajaxGetSelect(Request $request)
    {
        $id = $request->id;
        if ($id == 0) {
            $students = $this->student->newQuery()->with(['classroom'])->paginate(10);
        } else {
            $students = $this->student->newQuery()->where('classroom_id', $id)->with(['classroom'])->paginate(10);
        }
        return response($students);
    }

    public function searchPost(Request $request)
    {
        if ($request->ajax()) {
            if ($request->searchResult == '') {
                $students = $this->student->get();
            } else {
                $students = $this->student->where('name', 'like', '%' . $request->searchResult . '%')
                    ->orWhere('nation', 'like', '%' . $request->searchResult . '%')->get();
            }
            return response($students);
        }
    }

    public function exportIntoExcel()
    {
        return Excel::download(new StudentExport, 'student.xlsx');
    }

    public function importIntoExcel(ImportExcelRequest $request)
    {
        $file = $request->file('file');
        if ($file)
        {
            Excel::import(new StudentImport, $file);
            return redirect()->back()->with('success','Import Thành công');
        }
        else
        {
            abort(500);
        }

    }
}
