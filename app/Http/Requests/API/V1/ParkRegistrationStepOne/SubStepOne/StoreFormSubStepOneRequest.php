<?php

namespace App\Http\Requests\API\V1\ParkRegistrationStepOne\SubStepOne;

use App\Enums\ActivityArea;
use App\Enums\ActivitySubject;
use App\Enums\CompanyType;
use App\Enums\IsDaneshBonyan;
use App\Enums\IsDaneshBonyan as Enum;
use App\Enums\LicenseType;
use App\Rules\V1\FormStepOne\ImageLimitationCount;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class StoreFormSubStepOneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['bail', 'required', 'regex:/^[\p{Arabic} ]+$/u'],
            'english_name'=>'bail|required|regex:/^\w+$/i',
            'website'=>['bail', 'required', 'regex:/^(\w+\:?.\/?)+.?$/'],
            'email'=>'bail|required|regex:/^\w+\@\w+\.\w{2,}$/i|email',
            'phone_number.*'=>['bail', 'required', 'regex:/^(\+98|0)?9+\d{9}$/'],
            'fax_number.*'=>['bail', 'required', 'regex:/^09+\d{8}$/'],
            'activity_area'=>['bail', 'required', Rule::enum(ActivityArea::class)],
            'activity_subject'=>['bail', 'required', Rule::enum(ActivitySubject::class)],
            'activity_specialty'=>'required|regex:/^[\p{Arabic} ]+$/u|min:3|max:255',
            'activity_summary'=>'required|regex:/^[\p{Arabic} ]+$/u|min:3|max:255',
            'national_code'=>['bail', 'required', 'regex:/^[۰-۹]+$/'],
            'company_registration_number'=>['bail', 'required', 'regex:/^[۰-۹]+$/'],
            'company_registration_place'=>['bail', 'required', 'string'],
            'company_registration_date'=>'bail|required|date|before:yesterday',
            'national_card_and_birth.*'=>['bail', 'required', 'image', 'max:5120', new ImageLimitationCount('national_card_and_birth', 10)],
            'company_type'=>['bail', 'required', Rule::enum(CompanyType::class)],
            'is_danesh_bonyan'=>['bail', 'required'],
            'danesh_bonyan_license_type'=>['bail', Rule::requiredIf(request()->has('is_danesh_bonyan')), Rule::enum(LicenseType::class)],
            'danesh_bonyan_license_issuance_date'=>['bail',  Rule::requiredIf(request()->has('is_danesh_bonyan') ), 'date', 'before:today'],
            'danesh_bonyan_license_validity_date'=>['bail',  Rule::requiredIf(request()->has('is_danesh_bonyan') ), 'date', 'after:yesterday'],
            'license_title'=>'required',
            'license_issuance_date'=>['bail', 'required', 'date', 'before:today'],
            'license_validity_date'=>['bail', 'required', 'date', 'after:yesterday'],
            'license_issuance_reference'=>['bail', 'required', 'regex:/^[\p{Arabic} ]+$/u'],
            //            'resume.*'=>['bail', 'required', 'image', 'max:5120', new ImageLimitationCount('resume', 1)],
//            'logo.*'=>['bail', 'required', 'image', 'extensions:svg,png', 'max:5120', new ImageLimitationCount('logo', 1)],
//            'statute.*'=>['bail', 'required', 'image', 'extensions:svg,png', 'max:5120', new ImageLimitationCount('statute', 1)],
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message'   => 'حطای اعتبار سنجی',
            'code'   => Response::HTTP_UNAUTHORIZED,
            'reason' => $validator->errors(),
        ]));
    }
}
