<?php

namespace Admin\Models\Columns;

trait AboutColumn
{
    public static string $Id = 'Id';
    public static string $Title = 'Title';
    public static string $Slug = 'Slug';
    public static string $ImagePath = 'ImagePath';
    public static string $Remark = 'Remark';
    public static string $SortOrder = 'SortOrder';
    public static string $Content = 'Content';
    public static string $ShortContent = 'ShortContent';
    public static string $Publish = 'Publish';
    public static string $Seo = 'Seo';
    public static string $Status = 'Status';
    public static string $CreatedDate = 'CreatedDate';
    public static string $CreatedBy = 'CreatedBy';
    public static string $ChangedDate = 'ChangedDate';
    public static string $ChangedBy = 'ChangedBy';

    public static string $_All = 'tbAbout.*';
    public static string $_Id = 'tbAbout.Id';
    public static string $_Slug = 'tbAbout.Slug';
    public static string $_Title = 'tbAbout.Title';
    public static string $_Content = 'tbAbout.Content';
    public static string $_ShortContent = 'tbAbout.ShortContent';
    public static string $_ImagePath = 'tbAbout.ImagePath';
    public static string $_Remark = 'tbAbout.Remark';
    public static string $_SortOrder = 'tbAbout.SortOrder';
    public static string $_Publish = 'tbAbout.Publish';
    public static string $_Seo = 'tbAbout.Seo';
    public static string $_Status = 'tbAbout.Status';
    public static string $_CreatedDate = 'tbAbout.CreatedDate';
    public static string $_CreatedBy = 'tbAbout.CreatedBy';
    public static string $_ChangedDate = 'tbAbout.ChangedDate';
    public static string $_ChangedBy = 'tbAbout.ChangedBy';
}
