<?php

use App\Http\Controllers\Api\v1\ProjectController;
use App\Http\Controllers\Api\v1\TaskController;
use App\Http\Controllers\Api\v1\TaskStatusController;
use App\Http\Controllers\Api\v1\UserController;
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

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::middleware('role:admin')->group(function () {
            Route::apiResource('users', UserController::class);
        });
    
        Route::middleware('role:productowner')->group(function () {
            Route::apiResource('projects', ProjectController::class)->only(["index" , "store"]);
            Route::apiResource('tasks', TaskController::class)->only(["store" , "update"]);
        });

        Route::middleware('role:productowner,teammember')->group(function () {
            Route::apiResource('taskstatus', TaskStatusController::class)->parameters(['taskstatus' => 'task']);;
        });
    });
});
  