<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum ParkRegistrationsSubStepStatus: string
{
    use HasEnumValues;
    case SUB_STEP_COMPANY_COMPLETED = 'sub_step_company_completed';
    case SUB_STEP_CHIEF_EXECUTIVE_OFFICER_COMPLETED = 'sub_step_chief_executive_officer_completed';
    case SUB_STEP_BOARD_GOVERNANCE_COMPLETED = 'sub_step_board_governance_completed';
    case SUB_STEP_SHAREHOLDING_COMPLETED = 'sub_step_shareholding_completed';

}
