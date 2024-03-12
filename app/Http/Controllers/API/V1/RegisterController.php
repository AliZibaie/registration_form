<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Steps\StoreFormStepOneRequest;
use App\Services\V1\ParkRegistrationStepOne\FormSubStepOneService;

class RegisterController extends Controller
{

    public function registerCompany(StoreFormStepOneRequest $request)
    {
        try {
            FormSubStepOneService::save($request);
            echo "success";
        }catch (\Throwable $throwable){
            echo "fail";
            dd($throwable->getMessage());
        }
    }

}
