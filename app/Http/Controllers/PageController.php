<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function welcome() {
        return view('welcome');
    }

    public function authForms($params) {
        Log::info('params-auth-forms-page', ['value' => $params]);
        return view('auth-forms', [
            'params' => $params,
        ]);
    }
}
