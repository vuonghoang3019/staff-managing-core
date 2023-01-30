<?php

namespace admin\Repositories\Price;

use admin\Repositories\RepositoryInterface;

interface PriceRepositoryInterface extends RepositoryInterface
{
    public function getPrice($id);

    public function deletePrice($id);

}
