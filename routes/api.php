<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/all-users', [ApiController::class, 'getAllUsers'])->middleware('auth:sanctum');
