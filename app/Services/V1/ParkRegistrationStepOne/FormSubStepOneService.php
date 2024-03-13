<?php

namespace App\Services\V1\ParkRegistrationStepOne;

use App\Enums\ParkRegistrationsSubStepStatus;
use App\Enums\ParkRegistrationStepStatus;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepOneRequest;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\UpdateFormSubStepOneRequest;
use App\Models\RegistrationField;
use App\Models\Tracking;
use App\Services\V1\ImageService;

class FormSubStepOneService
{
    public static int $trackingCode;
    private static $instance = null;

    public static function getInstance(): ?FormSubStepOneService
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }
    public static function save(StoreFormSubStepOneRequest $request): ?FormSubStepOneService
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
            'is_danesh_bonyan'=>$request->input('is_danesh_bonyan'),
            'danesh_bonyan_license_type'=>$request->has('is_danesh_bonyan') ? $request->input('danesh_bonyan_license_type'): null,
            'danesh_bonyan_license_issuance_date'=>$request->has('is_danesh_bonyan') ?$request->input('danesh_bonyan_license_issuance_date'): null,
            'danesh_bonyan_license_validity_date'=>$request->has('is_danesh_bonyan') ?$request->input('danesh_bonyan_license_validity_date'): null,
            'license_title'=>$request->input('company_registration_date'),
            'license_issuance_date'=>$request->input('company_registration_date'),
            'license_validity_date'=>$request->input('company_registration_date'),
            'license_issuance_reference'=>$request->input('company_registration_date'),
        ];
       $companyInformation = RegistrationField::create($companyInformation);
       ImageService::save($request, $companyInformation);
       self::createPhones($companyInformation, $request->input('phone_number'));
       self::createFaxes($companyInformation, $request->input('fax_number'));
        $trackingCode = $companyInformation->tracking()->create(['code'=>rand(100000000, 1000000000)]);
        self::setTrackingCode($trackingCode->code);
        $progressLog = ['sub_step'=>ParkRegistrationsSubStepStatus::SUB_STEP_COMPANY_COMPLETED, 'step'=>ParkRegistrationStepStatus::STEP_PRIMARY_INFORMATION];
        $trackingCode->progressLog()->create($progressLog);
        return self::getInstance();
    }


    public static function createPhones(RegistrationField $companyInformation, array $phone_numbers): void
    {
        foreach ($phone_numbers as $phone_number) {
            $companyInformation->phones()->create(['phone_number'=>$phone_number]);
        }
    }

    public static function createFaxes(RegistrationField $companyInformation, array $fax_numbers): void
    {
        foreach ($fax_numbers as $fax_number) {
            $companyInformation->faxes()->create(['fax_number' => $fax_number]);
        }
    }

    public static function getTrackingCode(): int
    {
        return self::$trackingCode;
    }

    public static function setTrackingCode(int $trackingCode): void
    {
        self::$trackingCode = $trackingCode;
    }

    public static function update(UpdateFormSubStepOneRequest $request)
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
            'is_danesh_bonyan'=>$request->input('is_danesh_bonyan'),
            'danesh_bonyan_license_type'=>$request->has('is_danesh_bonyan') ? $request->input('danesh_bonyan_license_type'): null,
            'danesh_bonyan_license_issuance_date'=>$request->has('is_danesh_bonyan') ?$request->input('danesh_bonyan_license_issuance_date'): null,
            'danesh_bonyan_license_validity_date'=>$request->has('is_danesh_bonyan') ?$request->input('danesh_bonyan_license_validity_date'): null,
            'license_title'=>$request->input('company_registration_date'),
            'license_issuance_date'=>$request->input('company_registration_date'),
            'license_validity_date'=>$request->input('company_registration_date'),
            'license_issuance_reference'=>$request->input('company_registration_date'),
        ];
        $companyInformation = Tracking::query()->where('code', request('code'))->first()->companyField()->update($companyInformation);
        ImageService::update($request, $companyInformation);
//        self::updatehones($companyInformation, $request->input('phone_number'));
//        self::updateFaxes($companyInformation, $request->input('fax_number'));
    }

}