<?php

namespace Admin\Models\Columns;

trait PostColumn
{
    public static string $Id = 'Id';
    public static string $Slug = 'Slug';
    public static string $Title = 'Title';
    public static string $AuthorId = 'AuthorId';
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

    public static string $_All = 'tbPost.*';
    public static string $_Id = 'tbPost.Id';
    public static string $_AuthorId = 'tbPost.AuthorId';
    public static string $_Slug = 'tbPost.Slug';
    public static string $_Title = 'tbPost.Title';
    public static string $_Content = 'tbPost.Content';
    public static string $_ShortContent = 'tbPost.ShortContent';
    public static string $_ImagePath = 'tbPost.ImagePath';
    public static string $_Remark = 'tbPost.Remark';
    public static string $_SortOrder = 'tbPost.SortOrder';
    public static string $_Publish = 'tbPost.Publish';
    public static string $_Seo = 'tbPost.Seo';
    public static string $_Status = 'tbPost.Status';
    public static string $_CreatedDate = 'tbPost.CreatedDate';
    public static string $_CreatedBy = 'tbPost.CreatedBy';
    public static string $_ChangedDate = 'tbPost.ChangedDate';
    public static string $_ChangedBy = 'tbPost.ChangedBy';
}
