<?php

use App\Http\Controllers\api\AttendanceApiController;
use App\Http\Controllers\api\AuthApiController;
use App\Http\Controllers\api\LeaveApiController;
use App\Http\Controllers\api\ProfileApiController;
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

Route::get("attendance/list/{id}",[AttendanceApiController::class,'list']);
Route::get("leave/count/{id}",[LeaveApiController::class,'list']);
Route::get("profile/{id}",[ProfileApiController::class,'get']);
Route::put("profile/update",[ProfileApiController::class,'update']);
Route::post("login",[AuthApiController::class,'auth']);
