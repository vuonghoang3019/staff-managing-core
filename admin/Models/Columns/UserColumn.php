<?php

namespace Admin\Models\Columns;

trait UserColumn
{
    public static string $Id = 'Id';
    public static string $Code = 'Code';
    public static string $DisplayName = 'DisplayName';
    public static string $Email = 'Email';
    public static string $Password = 'Password';
    public static string $ImagePath = 'ImagePath';
    public static string $Status = 'Status';
    public static string $Remark = 'Remark';
    public static string $CodeReset = 'CodeReset';
    public static string $CodeTime = 'CodeTime';
    public static string $CreatedDate = 'CreatedDate';
    public static string $CreatedBy = 'CreatedBy';
    public static string $ChangedDate = 'ChangedDate';
    public static string $ChangedBy = 'ChangedBy';
    public static string $FailedLoginAttempts = 'FailedLoginAttempts';

    public static string $_All = 'tbUser.*';
    public static string $_Id = 'tbUser.Id';
    public static string $_Code = 'tbUser.Code';
    public static string $_DisplayName = 'tbUser.DisplayName';
    public static string $_Email = 'tbUser.Email';
    public static string $_Password = 'tbUser.Password';
    public static string $_ImagePath = 'tbUser.ImagePath';
    public static string $_Status = 'tbUser.Status';
    public static string $_Remark = 'tbUser.Remark';
    public static string $_CodeReset = 'tbUser.CodeReset';
    public static string $_CodeTime = 'tbUser.CodeTime';
    public static string $_CreatedDate = 'tbUser.CreatedDate';
    public static string $_CreatedBy = 'tbUser.CreatedBy';
    public static string $_ChangedDate = 'tbUser.ChangedDate';
    public static string $_ChangedBy = 'tbUser.ChangedBy';
    public static string $_FailedLoginAttempts = 'tbUser.FailedLoginAttempts';
}
