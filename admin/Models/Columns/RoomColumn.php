<?php

namespace Admin\Models\Columns;

trait RoomColumn
{
    public static string $Id = 'Id';
    public static string $DisplayName = 'DisplayName';
    public static string $Code = 'Code';
    public static string $Remark = 'Remark';
    public static string $SortOrder = 'SortOrder';
    public static string $Publish = 'Publish';
    public static string $Status = 'Status';
    public static string $CreatedDate = 'CreatedDate';
    public static string $CreatedBy = 'CreatedBy';
    public static string $ChangedDate = 'ChangedDate';
    public static string $ChangedBy = 'ChangedBy';

    public static string $_All = 'tbRoom.*';
    public static string $_Id = 'tbRoom.Id';
    public static string $_DisplayName = 'tbRoom.DisplayName';
    public static string $_Code = 'tbRoom.Code';
    public static string $_Remark = 'tbRoom.Remark';
    public static string $_Status = 'tbRoom.Status';
    public static string $_Publish = 'tbRoom.Publish';
    public static string $_SortOrder = 'tbRoom.SortOrder';
    public static string $_CreatedDate = 'tbAbout.CreatedDate';
    public static string $_CreatedBy = 'tbAbout.CreatedBy';
    public static string $_ChangedDate = 'tbAbout.ChangedDate';
    public static string $_ChangedBy = 'tbAbout.ChangedBy';
}
