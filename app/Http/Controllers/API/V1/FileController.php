<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\File\DownloadFileRequest;
use App\Http\Requests\API\V1\File\UploadFileRequest;
use App\Models\Image;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FileController extends Controller
{
    public function upload(UploadFileRequest $uploadFileRequest)
    {

        try {

            $trackingCode = $uploadFileRequest
                ->validated('code');
            $today = Carbon::today()->toDateString();

            $name = $uploadFileRequest
                ->validated('name');

            $uploadPath = $uploadFileRequest
                ->file('file')
                ->store($trackingCode.'/'.$today);

            $agent = new Agent();

            Image::query()->create([
                'name'=>$name,
                'path'=>$uploadPath,
                'ip'=>request()->ip(),
                'platform'=>$agent->platform(),
                'browser'=>$agent->browser(),
            ]);
            return ResponseAlias::HTTP_OK;
        }catch (\Throwable $exception) {
            return ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;
        }
    }

    public function download(DownloadFileRequest  $downloadFileRequest)
    {
        $fileName = request('name') ?? 'techpark';

        if (!file_exists(storage_path('app/' . request('file'))))
            return ResponseAlias::HTTP_NOT_FOUND;

        return response()->download(storage_path('app/' . request('file')), $fileName);
    }
}
