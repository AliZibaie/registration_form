<?php

namespace App\Services\V1\ParkRegistrationStepOne;

use App\Enums\RegistrationStatus;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepTwoRequest;
use App\Models\RegistrationField;
use App\Models\Step;
use App\Models\TrackingCode;
use Jenssegers\Agent\Agent;

class FormSubStepTwoService
{
    public static function save(StoreFormSubStepTwoRequest $request)
    {
        $trackingCode = $request->input('tracking_code');
        $trackingCode = TrackingCode::query()->where('code', $trackingCode)->first();
        $companyField = $trackingCode->companyField();
        $newFormInformation = [
            'CEO_first_name'=>$request->input('CEO_first_name'),
            'CEO_last_name'=>$request->input('CEO_last_name'),
            'CEO_father_name'=>$request->input('CEO_father_name'),
            'CEO_identify_number'=>$request->input('CEO_identify_number'),
            'CEO_national_code'=>$request->input('CEO_national_code'),
            'CEO_gender'=>$request->input('CEO_gender'),
            'CEO_birth_place'=>$request->input('CEO_birth_place'),
            'CEO_birth_date'=>$request->input('CEO_birth_date'),
            'CEO_phone_number'=>$request->input('CEO_phone_number'),
            'CEO_last_educational_stage'=>$request->input('CEO_last_educational_stage'),
            'CEO_educational_group'=>$request->input('CEO_educational_group'),
            'CEO_educational_field'=>$request->input('CEO_educational_field'),
            'CEO_cooperation_type'=>$request->input('CEO_cooperation_type'),
            'CEO_cooperation_started_at'=>$request->input('CEO_cooperation_started_at'),
            'CEO_records'=>$request->input('CEO_records'),
        ];
         RegistrationField::query()->where('id',$trackingCode->registration_field_id )->update($newFormInformation);
        $agent = new Agent();
        $progressLog = [
            'status'=>RegistrationStatus::NOT_COMPLETED,
            'step_id'=>Step::query()->where('step_id', 1)->where('order', 2)->first()->id,
            'ip'=>$request->ip(),
            'browser'=>$agent->browser(),
            'platform'=>$agent->platform(),
        ];
        $trackingCode->progressLog()->create($progressLog);
    }
}
