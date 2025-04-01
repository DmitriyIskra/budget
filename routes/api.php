<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('/register-api', [ApiController::class, 'register'])->middleware(['throttle:api']);
Route::post('/login-api', [ApiController::class, 'login'])->middleware(['throttle:api']);
Route::get('/logout-api', [ApiController::class, 'logout'])->middleware(['throttle:api', 'auth:sanctum']);

Route::get('/all-users', [ApiController::class, 'getAllUsers'])->middleware(['throttle:api', 'auth:sanctum']);