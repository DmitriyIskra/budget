<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function registration(Register $request) {
        $data = $request->validated();
        Log::info('__VALIDATED__: ', $data);

        if($data) {
            $user = User::query()->create([
                'name' => $data['name'],
                'patronymic' => $data['patronymic'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'password' => $data['password'],
                // 'avatar' => $data -> ,
            ]);

            Auth::login($user);

            return to_route('board');
        }
    }

    public function login(LoginRequest $request) {
        $data = $request->validated();
    }

    public function logout() {

    }
}
