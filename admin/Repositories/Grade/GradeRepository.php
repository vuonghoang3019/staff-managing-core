<?php

namespace admin\Repositories\Grade;

use App\Models\Grade;
use admin\Repositories\BaseRepository;

class GradeRepository extends BaseRepository implements GradeRepositoryInterface
{
    public function getModel()
    {
       return Grade::class;
    }

    public function paginate()
    {
        return $this->model->orderBy('id','desc')->paginate(10);
    }
}
