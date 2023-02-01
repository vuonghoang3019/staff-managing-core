<?php

namespace admin\Http\Controllers;

use admin\Http\Requests\Classroom\ClassroomRequestAdd;
use admin\Repositories\Classroom\ClassroomRepositoryInterface;
use admin\Traits\DeleteTrait;

class ClassroomController extends FrontendController {
    private $classroomRepo;
    use DeleteTrait;

    public function __construct(ClassroomRepositoryInterface $classroomRepo)
    {
        parent::__construct();
        $this->classroomRepo = $classroomRepo;
    }

    public function index()
    {
        $classrooms = $this->classroomRepo->paginate();
        return view('admin::classroom.index', compact('classrooms'));
    }

    public function create()
    {
        $courses = $this->classroomRepo->getCourses();
        return view('admin::classroom.create', compact('courses'));
    }

    public function store(ClassroomRequestAdd $request)
    {
        $this->classroomRepo->create($request->all());
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $classroomEdit = $this->classroomRepo->detail($id);
        $courses = $this->classroomRepo->getCourses();
        return view('admin::classroom.edit', compact('courses', 'classroomEdit'));
    }

    public function update(ClassroomRequestAdd $request, $id)
    {
        $this->classroomRepo->update($id, $request->all());
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->classroomRepo->delete($id);
    }

    public function action($id)
    {
        $classroomAction = $this->classroomRepo->detail($id);
        $classroomAction->is_active = $classroomAction->is_active ? 0 : 1;
        $classroomAction->save();
        return redirect()->back();
    }
}
