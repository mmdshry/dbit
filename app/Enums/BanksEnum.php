<?php

namespace App\Enums;

use App\Traits\EnumsTrait;

enum BanksEnum: string
{
    use EnumsTrait;

    case MARKAZI = 'بانک مرکزی';
    case SANAT_VA_MADAN = 'بانک صنعت و معدن';
    case MELLAT = 'بانک ملت';
    case REFAH = 'بانک رفاه';
    case MASKAN = 'بانک مسکن';
    case SEPAH = 'بانک سپه';
    case KESHAVARZI = 'بانک کشاورزی';
    case MELLI = 'بانک ملی ایران';
    case TEJARAT = 'بانک تجارت';
    case SADERAT = 'بانک صادرات ایران';
    case TOSEAH_SADERAT = 'بانک توسعه صادرات ایران';
    case POST = 'پست بانک ایران';
    case TOSEAH_TAAVON = 'بانک توسعه تعاون';
    case KARAFARIN = 'بانک کارآفرین';
    case PARSIAN = 'بانک پارسیان';
    case EGHTESAD_NOVIN = 'بانک اقتصاد نوین';
    case SAMAN = 'بانک سامان';
    case PASARGAD = 'بانک پاسارگاد';
    case SARMAYEH = 'بانک سرمایه';
    case SINA = 'بانک سینا';
    case MEHR_IRAN = 'بانک قرض‌الحسنه مهر ایران';
    case SHAHR = 'بانک شهر';
    case AYANDEH = 'بانک آینده';
    case GARDESHGARI = 'بانک گردشگری';
    case DAY = 'بانک دی';
    case IRANZAMIN = 'بانک ایران زمین';
    case RESALAT = 'بانک قرض‌الحسنه رسالت';
    case MELAL = 'موسسه اعتباری ملل';
    case KHAVARMIANEH = 'بانک خاورمیانه';
    case NOOR = 'موسسه اعتباری نور';
    case IRAN_VENEZUELA = 'بانک ایران و ونزوئلا';
    case UNKNOWN = 'نامشخص';
}
