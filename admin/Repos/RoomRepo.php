<?php

namespace Admin\Repos;

use Admin\Http\Resources\BaseCollection;
use Admin\Models\Room;
use Illuminate\Container\Container as Application;
use Admin\General\Room as RoomConfig;

class RoomRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->responseSingle = RoomConfig::NAME;
        $this->responseList = RoomConfig::LIST;
    }

    public function model(): string
    {
        return Room::class;
    }

    public function index()
    {
        $query = $this->baseQuery();

        $query = $query->select(Room::$_All);

        $response = new BaseCollection($this->pagination($query));

        return $this->baseIndex($this->pagination($query));
    }
}
