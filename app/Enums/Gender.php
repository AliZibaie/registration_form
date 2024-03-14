<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum Gender: string
{
    use HasEnumValues;
    case MALE =  'مرد';
    case FEMALE =  'زن';

}
