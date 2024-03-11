<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum IsDaneshBonyan: string
{
    use HasEnumValues;
    case YES = 'بلی';
    case NO = 'خیر';

}
