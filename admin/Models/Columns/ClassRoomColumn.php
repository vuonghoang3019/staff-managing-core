<?php

namespace Admin\Models\Columns;

trait ClassRoomColumn
{
    public static string $Id = 'Id';
    public static string $DisplayName = 'DisplayName';
    public static string $Code = 'Code';
    public static string $CourseId = 'CourseId';
    public static string $Publish = 'Publish';
    public static string $Status = 'Status';
    public static string $MaxStudent = 'MaxStudent';
    public static string $MinStudent = 'MinStudent';
    public static string $SortOrder = 'SortOrder';
    public static string $CreatedDate = 'CreatedDate';
    public static string $CreatedBy = 'CreatedBy';
    public static string $ChangedDate = 'ChangedDate';
    public static string $ChangedBy = 'ChangedBy';

    public static string $_All = 'tbClassRoom.*';
    public static string $_Id = 'tbClassRoom.Id';
    public static string $_DisplayName = 'tbClassRoom.DisplayName';
    public static string $_CourseId = 'tbClassRoom.CourseId';
    public static string $_MaxStudent = 'tbClassRoom.MaxStudent';
    public static string $_MinStudent = 'tbClassRoom.MinStudent';
    public static string $_Publish = 'tbClassRoom.Publish';
    public static string $_Status = 'tbClassRoom.Status';
    public static string $_SortOrder = 'SortOrder';
    public static string $_CreatedDate = 'tbClassRoom.CreatedDate';
    public static string $_CreatedBy = 'tbClassRoom.CreatedBy';
    public static string $_ChangedDate = 'tbClassRoom.ChangedDate';
    public static string $_ChangedBy = 'tbClassRoom.ChangedBy';
}
