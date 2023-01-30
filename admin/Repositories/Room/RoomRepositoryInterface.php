<?php

namespace admin\Repositories\Room;

use admin\Repositories\RepositoryInterface;

interface RoomRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
