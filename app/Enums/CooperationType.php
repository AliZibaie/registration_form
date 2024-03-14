<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum CooperationType: string
{
    use HasEnumValues;
    case FULL_TIME = 'تمام وقت';
    case PART_TIME = 'پاره وقت';
    case ADVISOR = 'مشاور';

}
