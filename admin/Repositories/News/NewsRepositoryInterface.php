<?php

namespace Admin\Repositories\News;

use Admin\Repositories\RepositoryInterface;

interface NewsRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
