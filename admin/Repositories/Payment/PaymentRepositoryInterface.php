<?php

namespace admin\Repositories\Payment;

use admin\Repositories\RepositoryInterface;

interface PaymentRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getCourse();

    public function search($request);
}


