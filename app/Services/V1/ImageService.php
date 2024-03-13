<?php

namespace App\Services\V1;

use App\Http\Requests\API\V1\ParkRegistrationStepOne\StoreFormSubStepOneRequest;
use App\Http\Requests\API\V1\ParkRegistrationStepOne\UpdateFormSubStepOneRequest;
use App\Models\Image;
use App\Models\RegistrationField;

class ImageService
{
    public static function save(StoreFormSubStepOneRequest $request, RegistrationField $companyInformation)
    {
        self::saveImage($request, $companyInformation, 'logo');
        self::saveImage($request, $companyInformation, 'resume');
        self::saveImage($request, $companyInformation, 'statute');
        self::saveImage($request, $companyInformation, 'national_card_and_birth');
    }

    private static function saveImage(StoreFormSubStepOneRequest $request, RegistrationField $companyInformation, string $title): void
    {
        $files = $request->file($title);
        foreach ($files as $file) {
            $path = $file->store("public/$title");
            $info = ['url'=>$path, 'title'=>$title];
            $companyInformation->images()->create($info);
        }
    }

    public static function update(UpdateFormSubStepOneRequest $request, RegistrationField $companyInformation)
    {
    }
}
