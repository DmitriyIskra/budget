<?php

namespace App\Rules\Validation;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class hasEmailForLogin implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $email = User::query()->where('email', $value)->first('email');
        
        if(!$email) $fail("Данный $attribute не зарегистрирован"); 
    }
}
