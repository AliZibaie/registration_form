<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TrackingController extends Controller
{
    public function continueForm()
    {
        try {
            request()->validate([
                'code'=>['required',Rule::exists(Tracking::class, 'code')]
            ]);
            echo 'success';
        }catch (\Throwable $throwable){
            echo 'fail';
        }

    }
}
