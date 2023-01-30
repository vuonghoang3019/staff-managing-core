<?php

namespace Admin\Repositories\Slider;

use Admin\Repositories\RepositoryInterface;

interface  SliderRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
