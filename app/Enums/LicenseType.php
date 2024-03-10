<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum LicenseType: string
{
    use HasEnumValues;
    case PRODUCTIONTYPEONE = 'دانش بنیان تولیدی نوع 1';
    case PRODUCTIONTYPETWO = 'دانش بنیان تولیدی نوع 2 (صنعتی)';
    case NEWCOMPANYTYPEONE = 'دانش بنیان نوپای نوع 1';
    case NEWCOMPANYTYPETWO = 'دانش بنیان نوپای نوع 2';
}
