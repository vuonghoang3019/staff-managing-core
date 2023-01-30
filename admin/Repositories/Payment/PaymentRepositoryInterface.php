<?php

namespace Admin\Repositories\Payment;

use Admin\Repositories\RepositoryInterface;

interface PaymentRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getCourse();

    public function search($request);
}


