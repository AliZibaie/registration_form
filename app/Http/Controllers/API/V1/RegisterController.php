<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepOneRequest;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepTwoRequest;
use App\Services\V1\ParkRegistrationStepOne\FormSubStepOneService;
use App\Services\V1\ParkRegistrationStepOne\FormSubStepTwoService;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function registerCompany(StoreFormSubStepOneRequest $request)
    {
        try {
            DB::beginTransaction();
            $trackingCode = FormSubStepOneService::save($request)::getTrackingCode();
            DB::commit();
            return response()
                ->json([
                    'status'=>true,
                    'message'=>'company information stored successfully',
                    'tracking_code'=>$trackingCode,
                ]);
        }catch (\Throwable $throwable){
            DB::rollBack();
            return response()
                ->json([
                    'status'=>false,
                    'message'=>'operation failed',
                ], 500);
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
