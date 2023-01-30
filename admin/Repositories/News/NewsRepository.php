<?php

namespace Admin\Repositories\News;

use App\Models\News;
use Admin\Repositories\BaseRepository;

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
