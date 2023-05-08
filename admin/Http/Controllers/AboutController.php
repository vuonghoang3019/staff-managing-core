<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\About\BaseRequest;
use Admin\Http\Requests\About\EditRequest;
use Admin\Http\Requests\About\UpdateRequest;
use Admin\Repos\AboutRepo;
use Illuminate\Http\JsonResponse;

class AboutController extends BaseController
{
    protected AboutRepo $repo;

    public function __construct(AboutRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index(): JsonResponse
    {
        return $this->repo->index();
    }

    public function store(BaseRequest $request): JsonResponse
    {
        return $this->repo->baseStore($request->data());
    }

    public function edit(EditRequest $request, $id): JsonResponse
    {
        return $this->repo->baseEdit();
    }

    public function update(UpdateRequest $request, $id): JsonResponse
    {
        return $this->repo->baseUpdate($request->data(), $id);
    }

    public function delete($id): JsonResponse
    {
        return $this->repo->baseDestroy($id);
    }
}
