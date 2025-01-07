<?php

namespace App\Classes;

use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthServiceClass
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function registration(array $data):bool {
        $user = User::query()->create([
            'name' => $data['name'],
            'patronymic' => $data['patronymic'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => $data['password'],
            // 'avatar' => $data -> ,
        ]);

        Mail::to($user->email)->send(new RegisterEmail($user->name, $user->patronymic));

        Auth::login($user);

        return true;
    }

}
