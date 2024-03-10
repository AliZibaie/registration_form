<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\CompanyInformation\StoreCompanyInformationRequest;
use Iamfarhad\Validation\Rules\PersianAlpha;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function register(StoreCompanyInformationRequest $request)
    {
        try {
            $request->validated();
            echo "bolbol";
        }catch (\Throwable $throwable){
            echo "bolboil";
        }
    }
}
