<?php

namespace Backend\Repositories\Payment;

use Backend\Repositories\RepositoryInterface;

interface PaymentRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getCourse();

    public function search($request);
}


