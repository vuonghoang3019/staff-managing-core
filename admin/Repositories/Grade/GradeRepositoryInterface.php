<?php

namespace admin\Repositories\Grade;

use admin\Repositories\RepositoryInterface;

interface GradeRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
