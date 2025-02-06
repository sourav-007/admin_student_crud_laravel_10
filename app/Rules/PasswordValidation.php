<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/[A-Z]/', $value)) {
            $fail('The ' . $attribute . ' must include at least one uppercase letter.');
        }

        if (!preg_match('/[a-z]/', $value)) {
            $fail('The ' . $attribute . ' must include at least one lowercase letter.');
        }

        if (!preg_match('/\d/', $value)) {
            $fail('The ' . $attribute . ' must include at least one number.');
        }

        if (!preg_match('/[@$!%*?&]/', $value)) {
            $fail('The ' . $attribute . ' must include at least one special character.');
        }
        
        if (preg_match('/\s/', $value)) {
            $fail('The ' . $attribute . ' must not contain spaces.');
        }
    }
}
