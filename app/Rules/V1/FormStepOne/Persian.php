<?php

namespace App\Rules\V1\FormStepOne;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Persian implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
            if (!preg_match('/^[\p{Arabic} ]+$/u', $value)) {
                $fail('لطفا فیلد مورد نظر را بصورت فارسی وارد کنید.');
            }

    }
}
