<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\Post\BaseRequest;
use Admin\Http\Requests\Post\EditRequest;
use Admin\Http\Requests\Post\UpdateRequest;
use Admin\Repos\PostRepo;

class PostController extends BaseController
{
    private PostRepo $repo;

    public function __construct(PostRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->index();
    }

    public function create()
    {
        
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
