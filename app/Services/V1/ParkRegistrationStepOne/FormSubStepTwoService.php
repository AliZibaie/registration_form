<?php

namespace App\Services\V1\ParkRegistrationStepOne;

use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepTwoRequest;

class FormSubStepTwoService
{
    public static function save(StoreFormSubStepTwoRequest $request, int $trackingCode)
    {
        if (!CheckStep::isPreviousStepCompleted(1, $trackingCode)){
            echo 'fail';
        }

    }
}
