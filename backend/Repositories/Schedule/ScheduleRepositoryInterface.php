<?php

namespace Backend\Repositories\Schedule;

use Backend\Repositories\RepositoryInterface;

interface ScheduleRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getWeek();

    public function getClassrooms();

    public function getUsers();

    public function getRooms();

    public function countTeacher($request);

    public function getSelect($request);

    public function detailSchedule($id);
}
