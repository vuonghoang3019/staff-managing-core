<?php

namespace Admin\Repositories\Contact;

use Admin\Repositories\RepositoryInterface;

interface ContactRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
