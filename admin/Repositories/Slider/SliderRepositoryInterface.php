<?php

namespace admin\Repositories\Slider;

use admin\Repositories\RepositoryInterface;

interface  SliderRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
