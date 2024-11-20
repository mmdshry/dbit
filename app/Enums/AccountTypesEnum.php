<?php

namespace App\Enums;

use App\Traits\EnumsTrait;

enum AccountTypesEnum: string
{
    use EnumsTrait;

    case DEBIT = 'نقدی';
    case CREDIT = 'اعتباری';
    case CREDITSPECIAL = 'اعتباری ویژه';
    case CARD_GIFT = 'کارت هدیه';
    case E_MONEY = 'E MONEY';
    case INSTALLMENT_CARD = 'INSTALLMENT CARD';
    case VIRTUAL_CARD = 'کارت مجازی';
    case ONLINE_PREPAID = 'پیش پرداخت آنلاین';
    case UNKNOWN = 'نامشخص';
}
