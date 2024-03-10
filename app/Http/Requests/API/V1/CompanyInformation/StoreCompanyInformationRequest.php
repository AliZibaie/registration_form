<?php

namespace App\Http\Requests\API\V1\CompanyInformation;

use App\Enums\ActivityArea;
use App\Enums\ActivitySubject;
use App\Enums\CompanyType;
use App\Enums\LicenseType;
use App\Rules\V1\FormPageOne\HasLicense;
use App\Rules\V1\FormPageOne\IranianFaxNumber;
use App\Rules\V1\FormPageOne\IranianPhoneNumber;
use App\Rules\V1\FormPageOne\IsDaneshBonyan;
use App\Rules\V1\FormPageOne\NationalCode;
use App\Rules\V1\FormPageOne\Persian;
use App\Rules\V1\FormPageOne\ProvinceAndCity;
use App\Rules\V1\FormPageOne\RegistrationCode;
use App\Rules\V1\FormPageOne\WebSite;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreCompanyInformationRequest extends FormRequest
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
            'name'=>['bail', 'required', new Persian()],
            'english_name'=>'bail|required|regex:/^[a-zA-Z]+$/i',
            'website'=>['bail', 'required', new WebSite()],
            'email'=>'bail|required|email',
            'phone_number'=>['bail', 'required', new IranianPhoneNumber()],
            'fax_number'=>['bail', 'required', new IranianFaxNumber()],
            'activity_area'=>['bail', 'required', Rule::enum(ActivityArea::class)],
            'activity_subject'=>['bail', 'required', Rule::enum(ActivitySubject::class)],
            'activity_specialty'=>'required',
            'activity_summary'=>'required',
            'national_code'=>['bail', 'required', 'numeric', new NationalCode()],
            'company_registration_number'=>['bail', 'required', 'numeric', new RegistrationCode()],
            'company_type'=>['bail', 'required', Rule::enum(CompanyType::class)],
            'company_registration_place'=>['bail', 'required', new ProvinceAndCity()],
            'company_registration_date'=>'bail|required|date',
            'is_danesh_bonyan'=>['bail', 'required', 'boolean'],
            'danesh_bonyan_license_type'=>['bail', new IsDaneshBonyan, Rule::enum(LicenseType::class)],
            'danesh_bonyan_license_issuance_date'=>['bail', new IsDaneshBonyan, 'date'],
            'danesh_bonyan_license_validity_date'=>['bail', new IsDaneshBonyan, 'date'],
            'license_title'=>'required',
            'license_issuance_date'=>['bail', new HasLicense(), 'date'],
            'license_validity_date'=>['bail', new HasLicense(), 'date'],
            'license_issuance_reference'=>['bail', new HasLicense()],
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message'   => 'حطای اعتبار سنجی',
            'data'      => $validator->errors()
        ], 403));
    }
    public function messages(): array
    {
        return [
            'name.required'=>'لطفا نام را وارد نمائید',
            'english_name.required'=>'لطفا نام را وارد نمائید',
            'english_name.regex'=>'لطفا نام را بصورت انگلیسی وارد نمائید',
            'website.required'=>'لطفا وبگاه را وارد نمائید',
            'website.regex'=>'لطفا وبگاه را بصورت انگلیسی وارد نمائید',
            'email.required'=>'لطفا ادرس ایمیل خود را وارد نمائید',
            'email.email'=>'لطفا ایمیل معتبر وارد نمائید',
        ];
    }
}
