<?php

namespace Admin\Services;

use Admin\General\Classroom;
use Admin\Repos\ClassroomRepo;

class ClassroomService extends BaseService
{
    public function __construct(ClassroomRepo $repo)
    {
        parent::__construct();

        $this->baseRepo = $repo;
        $this->responseSingle = Classroom::NAME;
        $this->responseList = Classroom::LIST;
    }
}
