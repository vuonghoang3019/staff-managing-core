<?php

namespace Backend\Repositories\Recruitment;

use App\Models\Recruitment;
use Backend\Repositories\BaseRepository;

class RecruitmentRepository extends BaseRepository implements RecruitmentRepositoryInterface
{
    public function getModel()
    {
        return Recruitment::class;
    }

    public function paginate()
    {
        return $this->model->paginate(5);
    }

//    public function with($relations)
//    {
//        return $this->model->with($relations);
//    }


}
