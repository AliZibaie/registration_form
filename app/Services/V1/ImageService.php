<?php

namespace App\Services\V1;

use App\Http\Requests\API\V1\CompanyInformation\StoreCompanyInformationRequest;
use App\Models\Company;
use App\Models\Image;

class ImageService
{
    public static function save(StoreCompanyInformationRequest $request, Company $companyInformation)
    {
        self::saveImage($request, $companyInformation, 'logo');
        self::saveImage($request, $companyInformation, 'resume');
        self::saveImage($request, $companyInformation, 'statute');
        self::saveImage($request, $companyInformation, 'national_card_and_birth');
    }

    private static function saveImage(StoreCompanyInformationRequest $request, Company $companyInformation,  string $title): void
    {
        $files = $request->file($title);
        foreach ($files as $file) {
            $path = $file->store("public/$title");
            $info = ['url'=>$path, 'title'=>$title];
            $companyInformation->images()->create($info);
        }
    }
}
