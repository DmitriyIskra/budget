<?php

namespace App\Http\Requests\Auth;

use App\Rules\Validation\EmaiRules;
use App\Rules\Validation\hasEmailForLogin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['bail', 'required', 'string', new EmaiRules, new hasEmailForLogin],
            'password' => ['bail', 'required'], 
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "Поле :attribute обязательно для заполнения",
            'email.string' => "Поле :attribute Должно быть строкой",
            
            'password.required' => "Поле :attribute обязательно для заполнения",
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'пароль'
        ];
    }
}
