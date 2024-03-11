<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\CompanyInformation\StoreCompanyInformationRequest;
use App\Services\V1\CompanyInformationService as Service;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function register(StoreCompanyInformationRequest $request)
    {
        try {
            Service::save($request);
            echo "success";
        }catch (\Throwable $throwable){
            echo "fail";
            dd($throwable->getMessage());
        }
    }
}
