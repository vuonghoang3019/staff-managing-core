<?php

namespace Admin\Models\Columns;

trait PaymentColumn
{
    public static string $Id = 'Id';
    public static string $UserId = 'UserId';
    public static string $CourseId = 'CourseId';
    public static string $Total = 'Total';
    public static string $TransactionCode = 'TransactionCode';
    public static string $Remark = 'Remark';
    public static string $VnResponseCode = 'VnResponseCode';
    public static string $CodeVnPay = 'CodeVnPay';
    public static string $CodeBank = 'CodeBank';
    public static string $Time = 'Time';

    public static string $_All = 'tbPayment.*';
    public static string $_Id = 'tbPayment.Id';
    public static string $_UserId = 'tbPayment.UserId';
    public static string $_CourseId = 'tbPayment.CourseId';
    public static string $_Total = 'tbPayment.Total';
    public static string $_TransactionCode = 'tbPayment.TransactionCode';
    public static string $_Remark = 'tbPayment.Remark';
    public static string $_VnResponseCode = 'tbPayment.VnResponseCode';
    public static string $_CodeVnPay = 'tbPayment.CodeVnPay';
    public static string $_CodeBank = 'tbPayment.CodeBank';
    public static string $_Time = 'tbPayment.Time';
}
