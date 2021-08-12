<?php

namespace Backend\Repositories\Grade;

use Backend\Repositories\RepositoryInterface;

interface GradeRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
