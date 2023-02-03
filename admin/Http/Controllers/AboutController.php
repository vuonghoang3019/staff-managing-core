<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\About\BaseRequest;
use Admin\Http\Requests\About\EditRequest;
use Admin\Http\Requests\About\UpdateRequest;
use Admin\Services\AboutService;
use Admin\Traits\StorageImageTrait;

class AboutController extends BaseController
{
    protected AboutService $service;
    use StorageImageTrait;

    public function __construct(AboutService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->baseIndex();
    }

    public function store(BaseRequest $request)
    {
        return $this->service->baseStore($request->data());
    }

    public function edit(EditRequest $request, $id)
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
