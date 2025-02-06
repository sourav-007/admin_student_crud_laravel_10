<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NameValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match('/\d/', $value)) {
            $fail('The ' . $attribute . ' field cannot contain numbers.');
        }

        // if (preg_match('/\s{2,}/', $value)) {
        //     $fail('The ' . $attribute . ' field cannot contain multiple consecutive spaces.');
        // }

        // if (!preg_match('/^[a-zA-Z]+ [a-zA-Z]+$/', $value)) {
        //     $fail('The ' . $attribute . ' field must contain exactly two words separated by a single space.');
        // }

        if (!preg_match('/^([A-Z][a-z]*)( [A-Z][a-z]*)?$/', $value)) {
            $fail('The ' . $attribute . ' field must start with a capital letter and follow proper Title Case.');
        }
    }
}
