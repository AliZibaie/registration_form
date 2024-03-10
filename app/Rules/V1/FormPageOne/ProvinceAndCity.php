<?php

namespace App\Rules\V1\FormPageOne;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProvinceAndCity implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
