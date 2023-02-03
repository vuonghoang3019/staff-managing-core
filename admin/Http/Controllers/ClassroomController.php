<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\Classroom\BaseRequest;
use Admin\Http\Requests\Classroom\EditRequest;
use Admin\Http\Requests\Classroom\UpdateRequest;
use Admin\Services\ClassroomService;

class ClassroomController extends BaseController {

    protected ClassroomService $service;

    public function __construct(ClassroomService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->baseIndex();
    }

    public function create()
    {
        //get course
//        $courses = $this->classroomRepo->getCourses();

    }

    public function store(BaseRequest $request)
    {
        return $this->service->baseStore($request->data());
    }

    public function edit(EditRequest $request,$id)
    {
        return $this->service->baseEdit();
    }

    public function update(UpdateRequest $request, $id)
    {
        return $this->service->baseUpdate($request->data(), $id);
    }

    public function delete($id)
    {
        return $this->service->baseDestroy($id);
    }
}
