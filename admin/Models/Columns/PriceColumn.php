<?php

namespace Admin\Models\Columns;

trait PriceColumn
{
    public static string $Id = 'Id';
    public static string $DisplayName = 'DisplayName';
    public static string $UnitPrice = 'UnitPrice';
    public static string $CourseId = 'CourseId';
    public static string $Lesson = 'Lesson';
    public static string $Remark = 'Remark';
    public static string $Discount = 'Discount';
    public static string $CreatedDate = 'CreatedDate';
    public static string $CreatedBy = 'CreatedBy';
    public static string $ChangedDate = 'ChangedDate';
    public static string $ChangedBy = 'ChangedBy';

    public static string $_All = 'tbPrice.*';
    public static string $_Id = 'tbPrice.Id';
    public static string $_DisplayName = 'tbPrice.DisplayName';
    public static string $_UnitPrice = 'tbPrice.UnitPrice';
    public static string $_CourseId = 'tbPrice.CourseId';
    public static string $_Lesson = 'tbPrice.Lesson';
    public static string $_Remark = 'tbPrice.Remark';
    public static string $_Discount = 'tbPrice.Discount';
    public static string $_CreatedDate = 'tbPrice.CreatedDate';
    public static string $_CreatedBy = 'tbPrice.CreatedBy';
    public static string $_ChangedDate = 'tbPrice.ChangedDate';
    public static string $_ChangedBy = 'tbPrice.ChangedBy';
}
