<?php

namespace App\Rules\Validation;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;

class EmaiRules implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $reg_val = '/^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i';
        if(preg_match($reg_val, $value) !== 1) {
            Log::info('__PREG_MATCH: '.preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i', $value));
            Log::info('__EMAIL__:'.$value);
            $fail('Не корректный email адрес, парам пам, пам');
            // $fail('validation.email')->translate([], 'ru');
        };
    }

    public function messages() 
    {

    }
}
