<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registration(Register $register) {
        $data = $register->validated();
    }

    public function login() {

    }

    public function logout() {

    }
}
