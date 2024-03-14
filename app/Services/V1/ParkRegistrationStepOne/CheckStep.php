<?php

namespace App\Services\V1\ParkRegistrationStepOne;

use App\Enums\ParkRegistrationsSubStepStatus;
use App\Models\TrackingCode;

class CheckStep
{
    public static function isPreviousStepCompleted(int $numberOfStep, int $trackingCode): bool
    {
        $test = TrackingCode::query()->where('code', $trackingCode)->getModel()->progressLog()->getModel()->id;
        dd($test);
        return TrackingCode::query()->where('sub_code', $trackingCode)->progressLog() == ParkRegistrationsSubStepStatus::getValues()[$numberOfStep - 1];
    }

}
