<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum EducationalStage: string
{
    use HasEnumValues;
    case ASSOCIATE_DEGREE = 'کاردانی';
    case UNDERGRADUATE = 'کارشناسی';
    case MASTER_DEGREE = 'کارشناسی ارشد';
    case PHD = 'دکترا';

}
