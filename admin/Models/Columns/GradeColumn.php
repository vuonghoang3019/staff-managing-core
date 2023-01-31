<?php

namespace Admin\Models\Columns;

trait GradeColumn
{
    public static string $Id = 'Id';
    public static string $DisplayName = 'DisplayName';
    public static string $Status = 'Status';
    public static string $Remark = 'Remark';
    public static string $CreatedDate = 'CreatedDate';
    public static string $CreatedBy = 'CreatedBy';
    public static string $ChangedDate = 'ChangedDate';
    public static string $ChangedBy = 'ChangedBy';

    public static string $_All = 'tbGrade.*';
    public static string $_Id = 'tbGrade.Id';
    public static string $_DisplayName = 'tbGrade.DisplayName';
    public static string $_Status = 'tbGrade.Status';
    public static string $_Remark = 'tbGrade.Remark';
    public static string $_CreatedDate = 'tbGrade.CreatedDate';
    public static string $_CreatedBy = 'tbGrade.CreatedBy';
    public static string $_ChangedDate = 'tbGrade.ChangedDate';
    public static string $_ChangedBy = 'tbGrade.ChangedBy';
}
