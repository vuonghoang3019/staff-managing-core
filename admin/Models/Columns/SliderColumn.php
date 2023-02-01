<?php

namespace Admin\Models\Columns;

trait SliderColumn
{
    public static string $Id = 'Id';
    public static string $DisplayName = 'DisplayName';
    public static string $Remark = 'Remark';
    public static string $ImagePath = 'ImagePath';
    public static string $Status = 'Status';

    public static string $_All = 'tbSlider.*';
    public static string $_Id = 'tbSlider.Id';
    public static string $_DisplayName = 'tbSlider.DisplayName';
    public static string $_Remark = 'tbSlider.Remark';
    public static string $_ImagePath = 'tbSlider.ImagePath';
    public static string $_Status = 'tbSlider.Status';
}
