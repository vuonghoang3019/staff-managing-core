<?php

namespace Backend\Repositories\Room;

use Backend\Repositories\RepositoryInterface;

interface RoomRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
