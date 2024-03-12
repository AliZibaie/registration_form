<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum ParkRegistrationStepStatus: string
{
    use HasEnumValues;
    case STEP_PRIMARY_INFORMATION = 'step_primary_information';
    case STEP_EXPERT_REVIEW = 'step_expert_review';
    case STEP_PAYMENT= 'step_payment';

}
