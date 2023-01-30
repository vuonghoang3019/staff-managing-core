<?php

namespace admin\Repositories\Recruitment;

use App\Models\Recruitment;
use admin\Repositories\BaseRepository;

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
}
