<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\GradeRequestAdd;
use Modules\Admin\Traits;

class AdminGradeController extends Controller
{
    use Traits\DeleteTrait;
    private $grade;
    public function __construct(Grade $grade)
    {
        $this->grade = $grade;
    }

    public function index()
    {
        $grades = $this->grade->paginate(10);
        return view('admin::grade.index',compact('grades'));
    }
    public function create()
    {
        return view('admin::grade.add');
    }
    public function store(GradeRequestAdd $request)
    {
        $this->grade->name = $request->name;
        $this->grade->description = $request->description;
        $this->grade->save();
        return redirect()->back();
    }
    public function edit($id)
    {
        $gradeEdit = $this->grade->find($id);
        if ($gradeEdit)
        {
            return view('admin::grade.edit',compact('gradeEdit'));
        }
        return abort(500);

    }
    public function update(GradeRequestAdd $request,$id)
    {
        $gradeEdit = $this->grade->find($id);
        $gradeEdit->name = $request->name;
        $gradeEdit->description = $request->description;
        $gradeEdit->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->grade);
    }

}
