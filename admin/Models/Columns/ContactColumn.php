<?php

namespace Admin\Models\Columns;

trait ContactColumn
{
    public static string $Id = 'Id';
    public static string $DisplayName = 'DisplayName';
    public static string $Status = 'Status';
    public static string $Phone = 'Phone';
    public static string $NameStudent = 'NameStudent';
    public static string $Email = 'Email';
    public static string $Content = 'Content';

    public static string $_All = 'tbContact.*';
    public static string $_Id = 'tbContact.Id';
    public static string $_DisplayName = 'tbContact.DisplayName';
    public static string $_Status = 'tbContact.Status';
    public static string $_Phone = 'SortOrder';
    public static string $_NameStudent = '$NameStudent';
    public static string $_Email = 'tbContact.CreatedDate';
    public static string $_Content = 'tbContact.CreatedBy';
}
