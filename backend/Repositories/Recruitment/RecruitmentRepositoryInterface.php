<?php

namespace Backend\Repositories\Recruitment;

use Backend\Repositories\RepositoryInterface;

interface RecruitmentRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}

