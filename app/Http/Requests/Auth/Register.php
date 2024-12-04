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
            'name' => 'bail|required|string|max:50',
            'patronymic' => 'bail|required|string|max:50',
            'email' => 'bail|required|string|email|max:100|exists:users,email',
            'phone' => 'bail|required|string|max:20',
            'password' => ['bail', 'required', 'string', Password::min(8)->max(50)->letters()->mixedCase()->numbers()->symbols()],
            'avatar' => 'bail|required|file|image|max:4000',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'string' => 'Для ввода :attribute доступен только текст',
            'name.max' => 'Максимальное количество символов для :attribute 50',
            'patronymic.max' => 'Максимальное количество символов для :attribute 50',
            'email.max' => 'Максимальное количество символов для :attribute 100',
            'phone.max' => 'Максимальное количество символов для :attribute 20',
            'email.email' => 'Не корректный email',
            'email.exists:users,email' => 'такой адрес уже зарегистрирован',
            'password.Password' => ':attribute не соответствует требованиям'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'имя',
            'patronymic' => 'отчество',
            'phone' => 'номер телефона',
            'password' => 'пароль',
        ];
    }
}
