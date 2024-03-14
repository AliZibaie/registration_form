<?php

namespace App\Services\V1;

use App\Http\Requests\API\V1\File\UploadFileRequest;
use App\Models\Image;
use App\Models\TrackingCode;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;

class FileUpload
{
    public static function saveUploadedFiles(UploadFileRequest $uploadFileRequest): void
    {
        $files = $uploadFileRequest->file('file');
        $today = Carbon::today()->toDateString();
        $agent = new Agent();

        foreach ($files as $file) {
            $trackingCode = $uploadFileRequest->validated('tracking_code');
            $file->store("$trackingCode/$today");
            $name = $uploadFileRequest->validated('name');
            dd(TrackingCode::query()
                ->where('code', $trackingCode)
                ->first()->registrationField());
            $registrationField = TrackingCode::query()
                ->where('code', $trackingCode)
                ->first()
                ->companyField()
                ->images()
                ->query()
                ->create([
                'name'=>$name,
                'path'=>$file,
                'ip'=>request()->ip(),
                'platform'=>$agent->platform(),
                'browser'=>$agent->browser(),
            ]);;
//            Image::query()->create([
//                'name'=>$name,
//                'path'=>$file,
//                'ip'=>request()->ip(),
//                'platform'=>$agent->platform(),
//                'browser'=>$agent->browser(),
//            ]);
        }
    }
}
