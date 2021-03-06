<?php

use App\Http\Controllers\Api\v1\ReferenceController;
use App\Http\Controllers\Api\v1\SettingController;
use App\Http\Controllers\Api\v1\EmployeeController;
use App\Http\Controllers\Api\v1\OvertimeController;
use App\Http\Controllers\Api\v1\OvertimePayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function () {
    Route::get('references', [ReferenceController::class, 'index']);
    Route::patch('settings', [SettingController ::class, 'update']);
    Route::post('employees', [EmployeeController ::class, 'create']);
    Route::post('overtimes', [OvertimeController ::class, 'create']);
    Route::get('overtime-pays/calculate', [OvertimePayController ::class, 'calculate']);
});
