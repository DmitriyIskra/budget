<?php

namespace App\Http\Controllers;


use App\Enums\Enums\AuthFormCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function welcome() {
        return view('welcome');
    }

    public function authForms(AuthFormCategory $params) {
        return view('auth-forms', [
            'params' => $params->value,
        ]);
    }
}
