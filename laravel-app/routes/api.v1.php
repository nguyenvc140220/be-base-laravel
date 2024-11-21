<?php

use App\Http\Api\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::middleware(['auth'])
    ->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh-token', [AuthController::class, 'refresh']);

        Route::get('user', function () {
            return [];
        })->middleware('auth:admin');

        Route::get('product', function () {
            return [];
        })->middleware('auth:user');
    });
