<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum RegistrationStatus: string
{
    use HasEnumValues;
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
    case PENDING = 'pending';
    case NOT_COMPLETED = 'not_completed';
    case RETURNED = 'returned';

}
