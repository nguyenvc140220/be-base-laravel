<?php


use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('password/forgot', [AuthController::class, 'forgotPassword']);
    Route::post('password/reset', [AuthController::class, 'resetPassword']);

    Route::middleware(['auth'])
        ->group(function () {
            Route::post('logout', [AuthController::class, 'logout']);
            Route::post('refresh-token', [AuthController::class, 'refresh']);

            Route::get('user', function () {
                return [];
            })->middleware('auth:admin');

            Route::get('product', function () {
                return [ProductController::class, 'getProducts'];
            })->middleware('auth:user');
        });
});
