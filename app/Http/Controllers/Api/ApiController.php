<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\Register;
use App\Models\User;
use Error;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class ApiController extends Controller
{
    public function getAllUsers() {
        // $users = DB::table('users')->get();
        $users = User::query()->get();
        
        Log::info('Get All Users', [
            'login-user' => Auth::user(),
        ]);

        return response()->json([
            'users' => $users,
        ], 200);
    }

    // " iskradmitrii@yandex.ru" Hgfcbhsa3!
    public function login(LoginRequest $request) {
        $resultValidation = $request->validated();
        
        $resultAttempt = Auth::attempt($resultValidation);

        if(!$resultAttempt) {
            return response()->json([
                "body" => "Не правильный логин или пароль",
            ], 401);
        } 
        Log::info('RESULT AUTH USER', [
            'resultAttempt' => $resultAttempt,
            'user' => Auth::user(),
        ]);
        // Auth::login();
        $user = User::query()->where('email', $request->email)->first();
        $user->tokens()->delete();

        return response()->json([
            'data' => $user,
            'token' => $user->createToken("Token for user: $user->name")->plainTextToken,
        ], 202);

    }

    // " iskradmitrii@yandex.ru" Hgfcbhsa3!
    public function register(Register $request): JsonResponse {
        $resultValidation = $request->validated();

        Log::info('RESULT VALIDATION REGISTER', $resultValidation);

        if(!$resultValidation) {
            return response()->json([
                'result' => 'Unauthorized',
            ], 401);
        }

        $user = User::create($resultValidation);

        Log::info('REGISTERED USER', ['data' => $user]);

        return response()->json([
            'data' => $user,
        ], 201);
    }

    public function logout(Request $request) {
        Log::info('LOGOUT INFO AUTH USER', ['body' => Auth::user()]);
        // Log::info('LOGOUT INFO', ['body' => $request->bearerToken()]);
        $request->user()->currentAccessToken()->delete();
        
        return response()->json(['body' => 'Вы вышли из аккаунт'], 200);
    }
}
