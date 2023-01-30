<?php

namespace Admin\Repositories\Schedule;

use Admin\Repositories\RepositoryInterface;

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
