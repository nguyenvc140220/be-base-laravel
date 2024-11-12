<?php

use App\Http\Controllers\Api\AuthApiController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthApiController::class, 'login']);
Route::middleware(['auth'])
    ->group(function () {
        Route::post('logout', [AuthApiController::class, 'logout']);
        Route::post('refresh-token', [AuthApiController::class, 'refresh']);

        Route::get('user', function () {
            return [];
        })->middleware('auth:admin');

        Route::get('product', function () {
            return [];
        })->middleware('auth:user');
    });
