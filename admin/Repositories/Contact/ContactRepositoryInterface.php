<?php

namespace admin\Repositories\Contact;

use admin\Repositories\RepositoryInterface;

interface ContactRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
