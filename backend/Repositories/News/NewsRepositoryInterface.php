<?php

namespace Backend\Repositories\News;

use Backend\Repositories\RepositoryInterface;

interface NewsRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
