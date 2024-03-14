<?php

namespace App\Services\V1\ParkRegistrationStepOne;

use App\Enums\RegistrationStatus;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepThreeRequest;
use App\Models\RegistrationField;
use App\Models\Step;
use App\Models\TrackingCode;
use Jenssegers\Agent\Agent;

class FormSubStepThreeService
{
    public static function save(StoreFormSubStepThreeRequest $request)
    {
        $trackingCode = $request->input('tracking_code');
        $trackingCode = TrackingCode::query()->where('code', $trackingCode)->first();
        $companyField = RegistrationField::query()->where('id',$trackingCode->registration_field_id )->first();
        $olderBoards = $companyField->boards;
        $newFormInformation = [
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'identify_number'=>$request->input('identify_number'),
            'national_code'=>$request->input('national_code'),
            'birth_place'=>$request->input('birth_place'),
            'birth_date'=>$request->input('birth_date'),
            'gender'=>$request->input('gender'),
            'cooperation_type'=>$request->input('cooperation_type'),
            'cooperation_started_at'=>$request->input('cooperation_started_at'),
            'position'=>$request->input('position'),
            'phone_number'=>$request->input('phone_number'),
            'last_educational_stage'=>$request->input('last_educational_stage'),
            'educational_group'=>$request->input('educational_group'),
            'educational_field'=>$request->input('educational_field'),
            'experience'=>$request->input('experience'),
            'email'=>$request->input('email'),
        ];
        if ($olderBoards){
            $olderBoards = json_decode($olderBoards, true);
            $updatedBoards = $olderBoards;
        }
        $updatedBoards[] = $newFormInformation;
        $companyField->query()->update(['boards'=> json_encode($updatedBoards)]);
        $agent = new Agent();
        $progressLog = [
            'status'=>RegistrationStatus::NOT_COMPLETED,
            'step_id'=>Step::query()->where('step_id', 1)->where('order', 3)->first()->id,
            'ip'=>$request->ip(),
            'browser'=>$agent->browser(),
            'platform'=>$agent->platform(),
        ];
        $trackingCode->progressLog()->create($progressLog);
    }
}
