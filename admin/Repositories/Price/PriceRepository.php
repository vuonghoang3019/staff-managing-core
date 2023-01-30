<?php

namespace admin\Repositories\Price;

use App\Models\Price;
use admin\Repositories\BaseRepository;

class PriceRepository extends BaseRepository implements PriceRepositoryInterface
{

    public function getModel()
    {
        return Price::class;
    }

    public function getPrice($id)
    {
        return $this->model->newQuery()->with(['course'])->where('course_id', $id)->get();
    }

    public function deletePrice($id)
    {
        return $this->model->newQuery()->where('course_id', $id)->delete();
    }
}
