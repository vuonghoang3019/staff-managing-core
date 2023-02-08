<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\About\BaseRequest;
use Admin\Http\Requests\About\EditRequest;
use Admin\Http\Requests\About\UpdateRequest;
use Admin\Repos\AboutRepo;

class AboutController extends BaseController
{
    protected AboutRepo $repo;

    public function __construct(AboutRepo $repo)
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

    public function edit(EditRequest $request, $id)
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
