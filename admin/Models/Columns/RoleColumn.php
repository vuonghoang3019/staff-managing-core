<?php

namespace Admin\Models\Columns;

trait RoleColumn
{
    public static string $Id = 'Id';
    public static string $DisplayName = 'DisplayName';
    public static string $Code = 'Code';
    public static string $Remark = 'Remark';
    public static string $SortOrder = 'SortOrder';

    public static string $_All = 'tbRole.*';
    public static string $_Id = 'tbRole.Id';
    public static string $_DisplayName = 'tbRole.DisplayName';
    public static string $_Code = 'tbRole.Code';
    public static string $_Remark = 'tbRole.Remark';
    public static string $_Discount = 'tbRole.SortOrder';
}
