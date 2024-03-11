<?php

namespace App\Services\V1;

use App\Http\Requests\API\V1\CompanyInformation\StoreCompanyInformationRequest;
use App\Models\CompanyInformation;

class CompanyInformationService
{
    public static function save(StoreCompanyInformationRequest $request)
    {
        $companyInformation = [
            'name'=>$request->input('name'),
            'english_name'=>$request->input('english_name'),
            'website'=>$request->input('website'),
            'email'=>$request->input('email'),
            'activity_area'=>$request->input('activity_area'),
            'activity_subject'=>$request->input('activity_subject'),
            'activity_specialty'=>$request->input('activity_specialty'),
            'activity_summary'=>$request->input('activity_summary'),
            'national_code'=>$request->input('national_code'),
            'company_registration_number'=>$request->input('company_registration_number'),
            'company_type'=>$request->input('company_type'),
            'company_registration_place'=>$request->input('company_registration_place'),
            'company_registration_date'=>$request->input('company_registration_date'),
            'is_danesh_bonyan'=>$request->input('company_registration_date'),
//            'danesh_bonyan_license_type'=>$request->input('company_registration_date'),
//            'danesh_bonyan_license_issuance_date'=>$request->input('company_registration_date'),
//            'danesh_bonyan_license_validity_date'=>$request->input('company_registration_date'),
            'license_title'=>$request->input('company_registration_date'),
            'license_issuance_date'=>$request->input('company_registration_date'),
            'license_validity_date'=>$request->input('company_registration_date'),
            'license_issuance_reference'=>$request->input('company_registration_date'),
        ];
       CompanyInformation::query()->create($companyInformation);
    }
}