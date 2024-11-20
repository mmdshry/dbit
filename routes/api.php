<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/v1/register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/v1/card', [ServiceController::class, 'card']);
    Route::post('/v1/shahkar', [ServiceController::class, 'shahkar']);
    Route::post('/v1/idImage', [ServiceController::class, 'idImage']);
    Route::post('/v1/idInformation', [ServiceController::class, 'idInformation']);
    Route::post('/v1/matchCardId', [ServiceController::class, 'matchCardId']);
});