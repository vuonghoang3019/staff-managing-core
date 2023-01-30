<?php

namespace admin\Http\Controllers;

use admin\Http\Requests\Grade\GradeRequestAdd;
use admin\Repositories\Grade\GradeRepositoryInterface;

class AdminGradeController extends FrontendController
{
    private $gradeRepo;

    public function __construct(GradeRepositoryInterface $gradeRepo)
    {
        parent::__construct();
        $this->gradeRepo = $gradeRepo;
    }

    public function index()
    {
        $grades = $this->gradeRepo->paginate();
        return view('admin::grade.index',compact('grades'));
    }
    public function create()
    {
        return view('admin::grade.create');
    }
    public function store(GradeRequestAdd $request)
    {
        $this->gradeRepo->create($request->all());
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $gradeEdit = $this->gradeRepo->detail($id);
        return view('admin::grade.edit',compact('gradeEdit'));

    }
    public function update(GradeRequestAdd $request,$id)
    {
        $this->gradeRepo->update($id, $request->all());
        return redirect()->back()->with('success','Cập nhật thành công');
    }
    public function delete($id)
    {
        return $this->gradeRepo->delete($id);
    }
    public function action($id)
    {
        $gradeEdit = $this->gradeRepo->detail($id);
        $gradeEdit->is_active = $gradeEdit->is_active ? 0 : 1;
        $gradeEdit->save();
        return redirect()->back();
    }

}
