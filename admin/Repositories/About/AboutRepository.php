<?php

namespace admin\Repositories\About;

use App\Models\About;
use admin\Repositories\BaseRepository;

class AboutRepository extends BaseRepository implements AboutRepositoryInterface
{
    public function getModel()
    {
        return About::class;
    }

    public function paginate()
    {
        return $this->model->paginate(5);
    }
}
