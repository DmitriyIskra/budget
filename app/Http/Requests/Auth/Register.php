<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class Register extends FormRequest
{
    protected $redirect = '/form-auth/register';

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
            'name' => 'required|string|max:50',
            'patronymic' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|exists:users,email',
            'phone' => 'required|string|max:20',
            'password' => ['required', 'string', Password::min(8)->max(50)->letters()->mixedCase()->numbers()->symbols()],
            'avatar' => 'required|file|image|max:4000',
        ];
    }
}
