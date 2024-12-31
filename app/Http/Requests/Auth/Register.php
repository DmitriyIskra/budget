<?php

namespace App\Http\Requests\Auth;

use App\Rules\Validation\EmaiRules;
use App\Rules\Validation\UniqueEmail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        Log::info('qweqwe', ['wdqwd' => DB::connection()->getName()]);
        return [
            'name' => 'bail|required|string|max:50',
            'patronymic' => 'bail|required|string|max:50',
            'email' => ['bail', 'required', 'string', new EmaiRules, 'max:100', new UniqueEmail], // , 
            'phone' => 'bail|required|string|max:20',
            'password' => ['bail', 'required', 'string', Password::min(8)->max(50)->letters()->mixedCase()->numbers()->symbols()], 
            'file' => 'bail|file|image|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'string' => 'Для ввода :attribute доступен только текст',
            'name.max' => 'Максимальное количество символов для :attribute :max',
            'patronymic.max' => 'Максимальное количество символов для :attribute :max',
            'phone.max' => 'Максимальное количество символов для :attribute :max',
            'email.max' => 'Максимальное количество символов для :attribute :max',
            'email.exists' => 'такой адрес уже зарегистрирован',
            'password.min' => ':attribute должен содержать минимум :min символов',
            'password.max' => ':attribute должен может максимум :max символов',
            'password.letters' => 'поле :attribute должно содержать хотя бы одну букву',
            'password.mixed' => 'Поле :attribute должно содержать как минимум одну заглавную и одну строчную буквы',
            'password.numbers' => 'Поле :attribute должно содержать хотя бы одно число.',
            'password.symbols' => 'Поле :attribute должно содержать хотя бы один символ',
            'file.file' => 'Поле :attribute должно быть файлом',
            'file.image' => 'В поле :attribute должно быть изображение',
            'file.max' => 'Поле :attribute не должно превышать :max килобайт',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'имя',
            'patronymic' => 'отчество',
            'phone' => 'номер телефона',
            'password' => 'пароль',
            'file' => 'файл',
        ];
    }
}
