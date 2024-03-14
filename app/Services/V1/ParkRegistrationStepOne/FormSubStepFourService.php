<?php

namespace App\Services\V1\ParkRegistrationStepOne;

use App\Enums\RegistrationStatus;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepFourRequest;
use App\Models\RegistrationField;
use App\Models\Step;
use App\Models\TrackingCode;
use Jenssegers\Agent\Agent;

class FormSubStepFourService
{
    public static function save(StoreFormSubStepFourRequest $request)
    {
        $trackingCode = $request->input('tracking_code');
        $trackingCode = TrackingCode::query()->where('code', $trackingCode)->first();
        $companyField = RegistrationField::query()->where('id',$trackingCode->registration_field_id )->first();
        $olderShareholders= $companyField->shareholders;

        $newFormInformation = [
            'type'=>$request->input('type'),
            'name'=>$request->input('name'),
            'share_percent'=>$request->input('share_percent'),
            'legal_shareholder_type'=>$request->input('legal_shareholder_type'),
            'full_name_legal_shareholder_representative'=>$request->input('full_name_legal_shareholder_representative'),
        ];
        if ($olderShareholders){
            $olderShareholders = json_decode($olderShareholders, true);
            $updatedShareholders = $olderShareholders;
        }
        $updatedShareholders[] = $newFormInformation;
        $companyField->query()->update(['shareholders'=> json_encode($updatedShareholders)]);
        $agent = new Agent();
        $progressLog = [
            'status'=>RegistrationStatus::NOT_COMPLETED,
            'step_id'=>Step::query()->where('step_id', 1)->where('order', 4)->first()->id,
            'ip'=>$request->ip(),
            'browser'=>$agent->browser(),
            'platform'=>$agent->platform(),
        ];
        $trackingCode->progressLog()->create($progressLog);
    }

}
