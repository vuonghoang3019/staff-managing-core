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

    public static string $_All = 'tbClassroom.*';
    public static string $_Id = 'tbClassroom.Id';
    public static string $_DisplayName = 'tbClassroom.DisplayName';
    public static string $_CourseId = 'tbClassroom.CourseId';
    public static string $_MaxStudent = 'tbClassroom.MaxStudent';
    public static string $_MinStudent = 'tbClassroom.MinStudent';
    public static string $_Publish = 'tbClassroom.Publish';
    public static string $_Status = 'tbClassroom.Status';
    public static string $_SortOrder = 'SortOrder';
    public static string $_CreatedDate = 'tbClassroom.CreatedDate';
    public static string $_CreatedBy = 'tbClassroom.CreatedBy';
    public static string $_ChangedDate = 'tbClassroom.ChangedDate';
    public static string $_ChangedBy = 'tbClassroom.ChangedBy';
}
