<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BoardController;
Use App\Http\Controllers\Api\V1\TaskController;

Route::group(['prefix' => 'V1'], function() {
    Route::apiResource('board', BoardController::class);
    Route::apiResource('task', TaskController::class);
});
