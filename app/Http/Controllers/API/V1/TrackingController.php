<?php

namespace App\Http\Controllers\API\V1;

use App\Enums\RegistrationStatus;
use App\Http\Controllers\Controller;
use App\Models\Step;
use App\Models\TrackingCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class TrackingController extends Controller
{
    public function continueForm(): JsonResponse|RedirectResponse
    {

        try {
            request()->validate([
                'tracking_code'=>['required',Rule::exists(TrackingCode::class, 'code')]
            ]);
            return response()->json([
                'status'=>true,
                'next_route'=>$this->nextRoute(),
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

    private function nextRoute(): string
    {
        $nextStep = $this->nextStep();
        $nextSubStep = $this->nextSubStep();
        return route("$nextStep.$nextSubStep");
    }

    private function nextStep(): string
    {
        $trackingCode = TrackingCode::query()->where('code', request('tracking_code'))->first();
        $lastProgressLog = $trackingCode->progressLog()->orderByDesc('created_at')->first();
        if ($lastProgressLog->status == RegistrationStatus::NOT_COMPLETED){
            return 'step_one';
        }
        $orderStep = $lastProgressLog->step->step->order;
        $orderNextStep = $orderStep + 0;

        $nextStep = Step::query()->where('step_id', null)->where('order', $orderNextStep)->first()->title;
        if ($nextStep){
            return $nextStep;
        }
       return 'check.status';
    }
    private function nextSubStep()
    {
        $trackingCode = TrackingCode::query()->where('code', request('tracking_code'))->first();
        $lastProgressLog = $trackingCode->progressLog()->orderByDesc('created_at')->first();

        $orderSubStep = $lastProgressLog->step->order;
        $stepId = $lastProgressLog->step->step_id;
        $orderNextSubStep = $orderSubStep + 1;

        $nextStep = Step::query()->where('step_id', $stepId)->where('order', $orderNextSubStep)->first()->title;
        if ($nextStep){
            return $nextStep;
        }
        return 'check.status';
    }
}
