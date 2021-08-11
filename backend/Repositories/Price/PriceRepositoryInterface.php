<?php

namespace Backend\Repositories\Price;

use Backend\Repositories\RepositoryInterface;

interface PriceRepositoryInterface extends RepositoryInterface
{
    public function getPrice($id);

    public function deletePrice($id);

}
