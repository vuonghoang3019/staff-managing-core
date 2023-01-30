<?php

namespace Admin\Models\Columns;

trait AboutColumn
{
    public static $Id = 'Id';
    public static $Title = 'Title';
    public static $Slug = 'Slug';
    public static $ImagePath = 'ImagePath';
    public static $Remark = 'Remark';
    public static $SortOrder = 'SortOrder';
    public static $Content = 'Content';
    public static $ShortContent = 'ShortContent';
    public static $Publish = 'Publish';
    public static $Seo = 'Seo';
    public static $Status = 'Status';
    public static $CreatedDate = 'CreatedDate';
    public static $CreatedBy = 'CreatedBy';
    public static $ChangedDate = 'ChangedDate';
    public static $ChangedBy = 'ChangedBy';

    public static $_All = 'about.*';
    public static $_Id = 'about.Id';
    public static $_Slug = 'about.Slug';
    public static $_Title = 'about.Title';
    public static $_Content = 'about.Content';
    public static $_ShortContent = 'about.ShortContent';
    public static $_ImagePath = 'about.ImagePath';
    public static $_Remark = 'about.Remark';
    public static $_SortOrder = 'about.SortOrder';
    public static $_Publish = 'about.Publish';
    public static $_Seo = 'about.Seo';
    public static $_Status = 'about.Status';
    public static $_CreatedDate = 'about.CreatedDate';
    public static $_CreatedBy = 'about.CreatedBy';
    public static $_ChangedDate = 'about.ChangedDate';
    public static $_ChangedBy = 'about.ChangedBy';
}
