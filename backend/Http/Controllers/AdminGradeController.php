<?php

namespace Backend\Http\Controllers;

use App\Models\Grade;
use Backend\Http\Requests\GradeRequestAdd;
use Backend\Traits\DeleteTrait;

class AdminGradeController extends FrontendController
{
    use DeleteTrait;

    private $grade;

    public function __construct(Grade $grade)
    {
        parent::__construct();
        $this->grade = $grade;
    }

    public function index()
    {
        $grades = $this->grade->orderBy('id','desc')->paginate(10);
        return view('backend::grade.index',compact('grades'));
    }
    public function create()
    {
        return view('backend::grade.create');
    }
    public function store(GradeRequestAdd $request)
    {
        $this->grade->name = $request->name;
        $this->grade->description = $request->description;
        $this->grade->save();
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $gradeEdit = $this->grade->find($id);
        if ($gradeEdit)
        {
            return view('backend::grade.edit',compact('gradeEdit'));
        }
        return abort(500);

    }
    public function update(GradeRequestAdd $request,$id)
    {
        $gradeEdit = $this->grade->find($id);
        $gradeEdit->name = $request->name;
        $gradeEdit->description = $request->description;
        $gradeEdit->save();
        return redirect()->back()->with('success','Cập nhật thành công');
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->grade);
    }
    public function action($id)
    {
        $gradeEdit = $this->grade->find($id);
        $gradeEdit->is_active = $gradeEdit->is_active ? 0 : 1;
        $gradeEdit->save();
        return redirect()->back();
    }

}
