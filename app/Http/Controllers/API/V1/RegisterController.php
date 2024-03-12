<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepOneRequest;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepTwoRequest;
use App\Models\Tracking;
use App\Services\V1\ParkRegistrationStepOne\FormSubStepOneService;
use App\Services\V1\ParkRegistrationStepOne\FormSubStepTwoService;

class RegisterController extends Controller
{

    public function registerCompany(StoreFormSubStepOneRequest $request)
    {
        try {
            FormSubStepOneService::save($request);
            echo "success";
        }catch (\Throwable $throwable){
            echo "fail";
            dd($throwable->getMessage());
        }
    }
    public function registerCEO(StoreFormSubStepTwoRequest $request, int $tracking)
    {
        try {
            FormSubStepTwoService::save($request, $tracking);
            echo "success";
        }catch (\Throwable $throwable){
            echo "fail";
            dd($throwable->getMessage());
        }
    }
}
