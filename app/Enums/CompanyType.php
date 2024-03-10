<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum CompanyType: string
{
    use HasEnumValues;
    case PRIVATEJOINT = 'سهامی خاص';
    case PUBLICJOINT= 'سهامی عام';
    case COOPERATIVE= 'تعاونی';
    case GENERALPARTNERSHIP= 'تضامنی';
    case LIMITEDLIABILITY= 'با مسئولیت محدود';
    case LIMITEDPARTNERSHIP = 'مختلط غیرسهامی';
    case JOINTPARTNERSHIP = 'مختلط سهامی';
    case PROPORTIONALPARTNERSHIP= 'نسبی';

}
