<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\CarEventController;
use App\Http\Controllers\Api\CarMarkController;
use App\Http\Controllers\Api\CarModelController;
use App\Http\Controllers\Api\CarStatusController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\MarcController;
use App\Http\Controllers\Api\ModelCarController;
use App\Http\Controllers\Api\OperationController;
use App\Http\Controllers\Api\RenterController;
use App\Http\Controllers\Api\UserStatusController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\GetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/get', GetController::class);
});

Route::apiResources([
    'cars' => CarController::class,
    'car_statuses' => CarStatusController::class,
    'car_events' => CarEventController::class,
    'car_marks' => CarMarkController::class,
    'car_models' => CarModelController::class,
    'operations' => OperationController::class,
    'renters' => RenterController::class,
    'user_statuses' => UserStatusController::class,
]);
