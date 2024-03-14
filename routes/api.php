<?php

use App\Http\Controllers\API\V1\FileController;
use App\Http\Controllers\API\V1\StepOne\FormController;
use App\Http\Controllers\API\V1\TrackingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1')->group(function (){
    // files
    Route::prefix('files')->group(function () {
        Route::post('upload', [FileController::class, 'upload']);
        Route::post('download', [FileController::class, 'download']);
    });
    // form 1
    Route::prefix('/registration')->group(function (){
        Route::prefix('step_one')->group(function (){
            Route::post('/sub_step_one', [FormController::class, 'registerStepOne'])
                ->name('step_one.step_one');
            Route::post('/sub_step_two', [FormController::class, 'registerStepTwo'])
                ->name('step_one.step_two');
            Route::post('/sub_step_three', [FormController::class, 'registerStepTwo'])
                ->name('step_one.step_three');
        });
        Route::post('/tracking', [TrackingController::class, 'continueForm']);
        Route::post('/status', [TrackingController::class, 'checkStatus'])
            ->name('check.status');
    });
    Route::name('update_')->prefix('update')->group(function (){
        Route::post('/step_one', [FormController::class, 'updateStepOne'])
            ->name('step_company');
        Route::post('/step_two', [FormController::class, 'updateCEO'])
            ->name('step_chief_executive_officer');
    });
});
