<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UppercaseValidator implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // the below code will do same work as - $value == null || $value ==''
        if(empty($value)) {
            $fail('The :attribute is required!');
        } else if(strtoupper($value) !== $value) {
            $fail('The :attribute must be in upper case!!!');
        }

        // !== this check should not be equal and type should be also same and != only check should not be equal.
    }
}
