<?php

use App\Http\Controllers\API\V1\RegisterController;
use App\Http\Controllers\API\V1\TrackingController;
use Illuminate\Http\Request;
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

Route::prefix('v1/registration')->group(function (){
    Route::post('/step_one', [RegisterController::class, 'registerCompany'])
        ->name('step_company');
    Route::post('/step_two', [RegisterController::class, 'registerCEO'])
        ->name('step_chief_executive_officer');
//    Route::post('/step_three', [RegisterController::class, 'registerCompany']);
//    ->name('step_board_governance');
//    Route::post('/step_four', [RegisterController::class, 'registerCompany']);
//    ->name('step_shareholding');
    Route::post('/tracking', [TrackingController::class, 'continueForm']);
    Route::post('/status', [TrackingController::class, 'checkStatus'])
        ->name('check.status');
});
