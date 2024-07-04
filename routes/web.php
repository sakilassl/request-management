<?php

use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'App\Http\Middleware\VerifyCsrfToken'])->group(function () {
    Route::get('/items', [RequestController::class, 'index']);
    Route::get('/items/{id}', [RequestController::class, 'show']);
    Route::post('/items', [RequestController::class, 'store']);
    Route::put('/items/{id}', [RequestController::class, 'update']);
    Route::delete('/items/{id}', [RequestController::class, 'destroy']);
});

