<?php

namespace Admin\Models\Columns;

trait PermissionColumn
{
    public static string $Id = 'Id';
    public static string $DisplayName = 'DisplayName';
    public static string $Remark = 'Remark';
    public static string $SortOrder = 'SortOrder';
    public static string $Value = 'Value';
    public static string $ParentId = '$ParentId';

    public static string $_All = 'tbPost.*';
    public static string $_Id = 'tbPost.Id';
    public static string $_DisplayName = 'tbPost.AuthorId';
    public static string $_Remark = 'tbPost.Slug';
    public static string $_SortOrder = 'tbPost.Title';
    public static string $_Value = 'tbPost.Content';
    public static string $_ParentId = 'tbPost.ShortContent';
}
