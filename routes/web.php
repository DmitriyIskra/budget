<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CountingController;
use App\Http\Controllers\IncomeItemsController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->middleware(['throttle:api'])->group(function() {
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/form-auth/{params}', 'authForms')->name('auth-forms');
});

Route::controller(AuthController::class)->middleware(['throttle:api'])->group(function() {
    Route::post('/register', 'registration')->name('registration');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});


// AUTH
Route::controller(PageController::class)->middleware(['throttle:api', 'auth'])->group(function() {
    Route::get('/board', 'board')->name('board');
});

// MODALS

Route::controller(IncomeItemsController::class)->middleware(['throttle:api'])->group(function() {
    Route::post('/income-add', 'store')->name('create_income');
});

