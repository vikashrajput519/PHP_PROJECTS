<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AgeValidator implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(empty($value)) {
            $fail('Age is mandatory!');
        } else if(!is_numeric($value)) {
            $fail('Age must be numeric!');
        } else if($value < 18) {
            $fail('Age must be greater then or equal to 18 years!');
        }
    }
}
