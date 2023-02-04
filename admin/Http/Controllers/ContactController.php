<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\Contact\BaseRequest;
use Admin\repos\Contactrepo;

class ContactController extends BaseController
{

    protected Contactrepo $repo;

    public function __construct(Contactrepo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->index();
    }

    public function edit(BaseRequest $request,$id)
    {
        return $this->repo->edit($request, $id);
    }
}
