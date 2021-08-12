<?php

namespace Backend\Repositories\Slider;

use Backend\Repositories\RepositoryInterface;

interface  SliderRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
