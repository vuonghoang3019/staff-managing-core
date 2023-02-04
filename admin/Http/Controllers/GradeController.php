<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\Grade\BaseRequest;
use Admin\Http\Requests\Grade\EditRequest;
use Admin\Http\Requests\Grade\UpdateRequest;
use Admin\Repos\GradeRepo;

class GradeController extends BaseController
{
    private GradeRepo $repo;

    public function __construct(GradeRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->index();
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
