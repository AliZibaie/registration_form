<?php

namespace App\Http\Controllers\API\V1\StepOne;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepFourRequest;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepThreeRequest;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepTwoRequest;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\SubStepOne\StoreFormSubStepOneRequest;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\SubStepOne\UpdateFormSubStepOneRequest;
use App\Models\RegistrationField;
use App\Services\V1\ParkRegistrationStepOne\FormSubStepFourService;
use App\Services\V1\ParkRegistrationStepOne\FormSubStepOneService;
use App\Services\V1\ParkRegistrationStepOne\FormSubStepThreeService;
use App\Services\V1\ParkRegistrationStepOne\FormSubStepTwoService;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class FormController extends Controller
{

    // first step form and first sub step form (company information)
    public function registerStepOne(StoreFormSubStepOneRequest $request)
    {
        try {
            DB::beginTransaction();
            $trackingCode = FormSubStepOneService::save($request)::getTrackingCode();
            DB::commit();
            return response()
                ->json([
                    'status'=>true,
                    'code'=>Response::HTTP_CREATED,
                    'message'=>'company information stored successfully',
                    'tracking_code'=>$trackingCode,
                ]);
        }catch (\Throwable $throwable){
            DB::rollBack();
            return response()
                ->json([
                    'status'=>false,
                    'code'=>Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message'=>'failed to store information!',
                ]);
        }
    }
    // first step form and second sub step form (CEO information)
    public function registerStepTwo(StoreFormSubStepTwoRequest $request)
    {
        try {
            DB::beginTransaction();
            FormSubStepTwoService::save($request);
            DB::commit();
            return response()
                ->json([
                    'status'=>true,
                    'code'=>Response::HTTP_CREATED,
                    'message'=>'CEO information stored successfully',
                ]);
        }catch (\Throwable $throwable){
            DB::rollBack();
            return response()
                ->json([
                    'status'=>false,
                    'code'=>Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message'=>'failed to store information!',
                ]);
        }
    }
    // first step form and third sub step form (boards information)
    public function registerStepThree(StoreFormSubStepThreeRequest $request)
    {
        try {
            DB::beginTransaction();
            FormSubStepThreeService::save($request);
            DB::commit();
            return response()
                ->json([
                    'status'=>true,
                    'code'=>Response::HTTP_CREATED,
                    'message'=>'board information stored successfully',
                ]);
        }catch (\Throwable $throwable){
            DB::rollBack();
            return response()
                ->json([
                    'status'=>false,
                    'code'=>Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message'=>'failed to store information!',
                ]);
        }
    }
    // first step form and fourth sub step form (shareholdings information)
    public function registerStepFour(StoreFormSubStepFourRequest $request)
    {
        try {
            DB::beginTransaction();
            FormSubStepFourService::save($request);
            DB::commit();
            return response()
                ->json([
                    'status'=>true,
                    'code'=>Response::HTTP_CREATED,
                    'message'=>'shareholders information stored successfully',
                ]);
        }catch (\Throwable $throwable){
            DB::rollBack();
            return response()
                ->json([
                    'status'=>false,
                    'code'=>Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message'=>'failed to store information!',
                    'reason'=>$throwable->getMessage(),
                ]);
        }
    }

    public function updateStepOne(UpdateFormSubStepOneRequest $request)
    {
        dd($request->validated());
        try {
            DB::beginTransaction();
            FormSubStepOneService::update($request);
            DB::commit();
            return response()
                ->json([
                    'status'=>true,
                    'message'=>'company information updated successfully',
                ]);
        }catch (\Throwable $throwable){
            DB::rollBack();
            return response()
                ->json([
                    'status'=>false,
                    'message'=>$throwable->getMessage(),
//                    'message'=>'operation failed',
                ], 500);
        }
    }


}
