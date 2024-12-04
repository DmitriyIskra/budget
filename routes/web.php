<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function() {
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/form-auth/{params}', 'authForms')->name('auth-forms');
});

Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'registration')->name('registration');
});