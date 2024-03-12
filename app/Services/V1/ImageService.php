<?php

namespace App\Services\V1;

use App\Http\Requests\API\V1\Steps\StoreFormStepOneRequest;
use App\Models\Image;
use App\Models\CompanyField;

class ImageService
{
    public static function save(StoreFormStepOneRequest $request, CompanyField $companyInformation)
    {
        self::saveImage($request, $companyInformation, 'logo');
        self::saveImage($request, $companyInformation, 'resume');
        self::saveImage($request, $companyInformation, 'statute');
        self::saveImage($request, $companyInformation, 'national_card_and_birth');
    }

    private static function saveImage(StoreFormStepOneRequest $request, CompanyField $companyInformation, string $title): void
    {
        $files = $request->file($title);
        foreach ($files as $file) {
            $path = $file->store("public/$title");
            $info = ['url'=>$path, 'title'=>$title];
            $companyInformation->images()->create($info);
        }
    }
}
