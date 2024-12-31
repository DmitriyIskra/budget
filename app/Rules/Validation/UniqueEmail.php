<?php

namespace App\Rules\Validation;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;

class UniqueEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = User::query()->where('email', $value)->first('email');
        Log::info('Validation exists email in DB', ['response' => $response]);
        if($response) {
            $fail("Такой $attribute уже зарегистрирован");
        }
    }
}
