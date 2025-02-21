<?php

namespace App\Http\Requests\Modals\IncomeAdd;

use Illuminate\Foundation\Http\FormRequest;

class IncomeAddRequest extends FormRequest
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
            "name" => 'required|string',
            "summ" => 'required|decimal:0,4',
        ];
    }

    public function messages() {
        return [
            'required' => "Поле :attribute обязательно для заполнения",
            'name.string' => "В поле :attributes должна быть строка",
            'summ.decimal' => "Поле :attributes должно быть числом и содержать :decimal знаков после запятой"
        ];
    }

    public function attributes() {
        return [
            'name' => 'Наименование дохода',
            'summ' => 'Сумма',
        ];
    }
}
