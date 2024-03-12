<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Steps\StoreFormStepFourRequest;
use App\Http\Requests\API\V1\Steps\StoreFormStepOneRequest;
use App\Http\Requests\API\V1\Steps\StoreFormStepThreeRequest;
use App\Http\Requests\API\V1\Steps\StoreFormStepTwoRequest;
use App\Services\V1\FormStepFourService;
use App\Services\V1\FormStepOneService;
use App\Services\V1\FormStepThreeService;
use App\Services\V1\FormStepTwoService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function registerFormStepOne(StoreFormStepOneRequest $request)
    {
        try {
            FormStepOneService::save($request);
            echo "success";
        }catch (\Throwable $throwable){
            echo "fail";
            dd($throwable->getMessage());
        }
    }

    public function registerFormStepTwo(StoreFormStepTwoRequest $request)
    {
        try {
            FormStepTwoService::save($request);
            echo "success";
        }catch (\Throwable $throwable){
            echo "fail";
            dd($throwable->getMessage());
        }
    }

    public function registerFormStepThree(StoreFormStepThreeRequest $request)
    {
        try {
            FormStepThreeService::save($request);
            echo "success";
        }catch (\Throwable $throwable){
            echo "fail";
            dd($throwable->getMessage());
        }
    }
    public function registerFormStepFour(StoreFormStepFourRequest $request)
    {
        try {
            FormStepFourService::save($request);
            echo "success";
        }catch (\Throwable $throwable){
            echo "fail";
            dd($throwable->getMessage());
        }
    }
}
