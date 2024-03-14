<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\File\DownloadFileRequest;
use App\Http\Requests\API\V1\File\UploadFileRequest;
use App\Services\V1\FileUpload;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FileController extends Controller
{
    public function upload(UploadFileRequest $uploadFileRequest)
    {
        try {
            FileUpload::saveUploadedFiles($uploadFileRequest);
            return ResponseAlias::HTTP_OK;
        }catch (\Throwable $exception) {
            return ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;
        }
    }

    public function download(DownloadFileRequest  $downloadFileRequest)
    {
        $fileName = request('name');

        if (!file_exists(storage_path('app/' . request('file'))))
            return ResponseAlias::HTTP_NOT_FOUND;

        return response()->download(storage_path('app/' . request('file')), $fileName);
    }
}
