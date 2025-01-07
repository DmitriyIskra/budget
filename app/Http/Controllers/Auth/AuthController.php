<?php

namespace App\Http\Controllers\Auth;

use App\Classes\AuthServiceClass as AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {}

    // PASSWORD dmitriyiskra@ Hdsjcb3!sc
    public function registration(Register $request) {
        $data = $request->validated();

        if(!$data) return;

        
        $this->authService->registration($data);

        return to_route('board');
    }

    public function login(LoginRequest $request) {
        $data = $request->validated();

        if(!$data) return;

        if(Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('board');
        }

        return back()->withErrors([
            'no_valid' => 'Не правильный email или пароль'
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
