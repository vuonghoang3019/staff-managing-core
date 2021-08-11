<?php

namespace Backend\Repositories\News;

use App\Models\News;
use Backend\Repositories\BaseRepository;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    public function getModel()
    {
        return News::class;
    }

    public function paginate()
    {
        return $this->model->paginate(5);
    }
}
