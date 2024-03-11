<?php

namespace App\Rules\V1\FormPageOne;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ImageLimitationCount implements ValidationRule
{
    public function __construct(private string $title, private int $cuont)
    {

    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
       if(count(request()->file($this->title)) > $this->cuont){
           $fail("لطفا فقط $this->cuont عدد عکس وارد نمائید.");
       }
    }
}
