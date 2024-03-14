<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\ProgressLog;
use App\Models\TrackingCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use function Laravel\Prompts\search;

class TrackingController extends Controller
{
    public function continueForm(): JsonResponse|RedirectResponse
    {

        try {
            request()->validate([
                'code'=>['required',Rule::exists(TrackingCode::class, 'code')]
            ]);
            dd('tracking_code');
            $trackingModel = TrackingCode::getTrackingCode(request('tracking_code'))->first();
            dd($trackingModel);
            $sub_step = $trackingModel->progressLog->sub_step;
            return response()->json([
                'status'=>true,
                'step'=>'park_registration',
                'sub_step'=>'company',
            ]);
        }catch (\Throwable $throwable){
            return response()
                ->json([
                    'status'=>false,
                    'message'=>'operation failed',
                    'code'=>Response::HTTP_INTERNAL_SERVER_ERROR,
                    'reason'=>$throwable->getMessage(),
                ]);
        }

    }

    public function checkStatus(): JsonResponse
    {
        request()->validate([
            'code'=>['required',Rule::exists(TrackingCode::class, 'code')]
        ]);
        $trackingModel = TrackingCode::query()->where('code', request('code'))->first();
        $status = $trackingModel->progressLog->status;
        return response()
            ->json([
                'status'=>$status,
            ]);
    }

    private function nextStep(array|string $routeStep): string
    {
        $stepIndex = array_search($routeStep, ParkRegistrationsSubStepStatus::getValues()) + 1;
        if ($stepIndex != count(ParkRegistrationsSubStepStatus::getValues())){
            $routeStep = ParkRegistrationsSubStepStatus::getValues()[array_search($routeStep, ParkRegistrationsSubStepStatus::getValues()) + 1];
            $routeStep = str_replace('_completed', '', $routeStep);
            $routeStep = str_replace('sub_', '', $routeStep);
            return $routeStep;
        }
        return 'check.status';
    }
}
