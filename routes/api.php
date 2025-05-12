<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\ExpenseController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::group([
        'prefix' => 'v1',
    ], function () {
        /**
         * @OA\SecurityScheme(
         *     type="http",
         *     description="Autenticação via token Bearer com Sanctum",
         *     name="Authorization",
         *     in="header",
         *     scheme="bearer",
         *     bearerFormat="JWT",
         *     securityScheme="bearerAuth"
         * )
         */
        Route::apiResource('expenses', ExpenseController::class);
    });
});
