<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum ShareHolderType: string
{
    use HasEnumValues;
    case LEGAL_PERSON = 'شخص حقوقی';
    case PRIVATE_PERSON = 'شخص حقیقی';

}
