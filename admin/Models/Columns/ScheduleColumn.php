<?php

namespace Admin\Models\Columns;

trait ScheduleColumn
{
    public static string $Id = 'Id';
    public static string $Weekday = 'Weekday';
    public static string $UserId = 'UserId';
    public static string $ClassRoomId = 'ClassRoomId';
    public static string $RoomId = 'RoomId';
    public static string $StartTime = 'StartTime';
    public static string $EndTime = 'EndTime';

    public static string $_All = 'tbSchedule.*';
    public static string $_Id = 'tbSchedule.Id';
    public static string $_Weekday = 'tbSchedule.DisplayName';
    public static string $_UserId = 'tbSchedule.Code';
    public static string $_ClassRoomId = 'tbSchedule.ClassRoomId';
    public static string $_RoomId = 'tbSchedule.RoomId';
    public static string $_StartTime = 'tbSchedule.StartTime';
    public static string $_EndTime = 'tbSchedule.EndTime';
}
