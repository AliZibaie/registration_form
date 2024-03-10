<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum ActivityArea: string
{
    use HasEnumValues;
    case  PRODUCTION = 'تولیدی';
    case  SERVICE = 'خدماتی';
    case  CONSULTING = 'مشاوره ای';
    case  BUSINESS = 'تجاری';
    case  DESIGN= 'طراحی';
    case  ENGINEERING = 'مهندسی';
    case  OTHER= 'سایر';

}
