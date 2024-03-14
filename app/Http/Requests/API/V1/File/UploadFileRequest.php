<?php

namespace App\Http\Requests\API\V1\File;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class UploadFileRequest extends FormRequest
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
            'tracking_code' => ['bail', 'required', 'integer', 'exists:tracking_codes,code'],
            'file.*' => ['bail', 'required', 'mimes:jpg,png,jpeg,pdf,svg', 'max:4096'],
            'name' => ['bail', 'required', 'string','min:3', 'max:255']
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
