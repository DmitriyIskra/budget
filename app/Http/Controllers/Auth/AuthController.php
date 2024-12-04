<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function registration(Register $register) {
        $data = $register->validated();
        Log::info('__VALIDATED__: ', $data);
        // if($data) {
        //     redirect();
        // }
    }

    public function login() {

    }

    public function logout() {

    }
}
