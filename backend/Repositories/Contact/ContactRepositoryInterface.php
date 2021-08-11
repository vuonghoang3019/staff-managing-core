<?php

namespace Backend\Repositories\Contact;

use Backend\Repositories\RepositoryInterface;

interface ContactRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
