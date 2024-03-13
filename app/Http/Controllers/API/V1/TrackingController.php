<?php

namespace App\Http\Controllers\API\V1;

use App\Enums\ParkRegistrationsSubStepStatus;
use App\Http\Controllers\Controller;
use App\Models\ProgressLog;
use App\Models\Tracking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use function Laravel\Prompts\search;

class TrackingController extends Controller
{
    public function continueForm(): JsonResponse|RedirectResponse
    {

        try {
            request()->validate([
                'code'=>['required',Rule::exists(Tracking::class, 'code')]
            ]);
            $trackingModel = Tracking::query()->where('code', request('code'))->first();
            $sub_step = $trackingModel->progressLog->sub_step;
            return redirect()->route($this->nextStep($sub_step));
        }catch (\Throwable $throwable){
            return response()
                ->json([
                    'status'=>false,
                    'message'=>'operation failed',
                ], 500);
        }

    }

    public function checkStatus(): JsonResponse
    {
        request()->validate([
            'code'=>['required',Rule::exists(Tracking::class, 'code')]
        ]);
        $trackingModel = Tracking::query()->where('code', request('code'))->first();
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
