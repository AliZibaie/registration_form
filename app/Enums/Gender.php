<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum Gender: string
{
    use HasEnumValues;
    case MALE =  'male';
    case FEMALE =  'female';

}
