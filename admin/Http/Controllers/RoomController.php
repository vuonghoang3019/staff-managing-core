<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\Room\BaseRequest;
use Admin\Http\Requests\Room\EditRequest;
use Admin\Http\Requests\Room\UpdateRequest;
use Admin\Repos\RoomRepo;
use Illuminate\Http\Request;

class RoomController extends BaseController
{
    private $repo;

    public function __construct(RoomRepo $repo)
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
        return $this->repo->baseDelete($id);
    }
}
