<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum ParkRegistrationStepStatus: string
{
    use HasEnumValues;
    case STEP_PRIMARY_INFORMATION_COMPLETED = 'step_primary_information_completed';
    case STEP_EXPERT_REVIEW_COMPLETED = 'step_expert_review_completed';
    case STEP_PAYMENT_COMPLETED = 'step_payment_completed';

}
