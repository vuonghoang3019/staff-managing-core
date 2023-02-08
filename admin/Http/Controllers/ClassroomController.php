<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\Classroom\BaseRequest;
use Admin\Http\Requests\Classroom\EditRequest;
use Admin\Http\Requests\Classroom\UpdateRequest;
use Admin\Repos\ClassroomRepo;

class ClassroomController extends BaseController {

    protected ClassroomRepo $repo;

    public function __construct(ClassroomRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->index();
    }

    public function create()
    {
        //get course
//        $courses = $this->classroomRepo->getCourses();

    }

    public function store(BaseRequest $request)
    {
        return $this->repo->baseStore($request->data());
    }

    public function edit(EditRequest $request,$id)
    {
        return $this->repo->baseEdit();
    }

    public function update(UpdateRequest $request, $id)
    {
        return $this->repo->baseUpdate($request->data(), $id);
    }

    public function delete($id)
    {
        return $this->repo->baseDestroy($id);
    }
}
