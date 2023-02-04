<?php

namespace Admin\Models\Columns;

trait CourseColumn
{
    public static string $Id = 'Id';
    public static string $DisplayName = 'DisplayName';
    public static string $Status = 'Status';
    public static string $ImagePath = 'ImagePath';
    public static string $Remark = 'Remark';
    public static string $Publish = 'Publish';
    public static string $SortOrder = 'SortOrder';
    public static string $CreatedDate = 'CreatedDate';
    public static string $CreatedBy = 'CreatedBy';
    public static string $ChangedDate = 'ChangedDate';
    public static string $ChangedBy = 'ChangedBy';

    public static string $_All = 'tbCourse.*';
    public static string $_Id = 'tbCourse.Id';
    public static string $_DisplayName = 'tbCourse.DisplayName';
    public static string $_Status = 'tbCourse.Status';
    public static string $_ImagePath = 'tbCourse.ImagePath';
    public static string $_Remark = 'tbCourse.Remark';
    public static string $__Publish = 'tbCourse.Publish';
    public static string $__SortOrder = 'tbCourse.SortOrder';
    public static string $_CreatedDate = 'tbCourse.CreatedDate';
    public static string $_CreatedBy = 'tbCourse.CreatedBy';
    public static string $_ChangedDate = 'tbCourse.ChangedDate';
    public static string $_ChangedBy = 'tbCourse.ChangedBy';
}
