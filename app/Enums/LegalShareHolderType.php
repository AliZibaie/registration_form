<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum LegalShareHolderType: string
{
    use HasEnumValues;
    case GOVERNMENT_ORGANIZATION = 'سازمان و نهاد دولتی';
    case UNIVERSITY = 'دانشگاه';
    case INDUSTRY = 'صنعت';
    case PRIVATE_SECTOR = 'بخش خصوصی';

}
