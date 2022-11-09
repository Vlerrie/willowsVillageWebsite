<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Str;

class SaMobileNumber implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (!Str::startsWith($value, '27')){
            $fail('The :attribute must start with a the South African mobile code of 27 or +27.');
        }

        if (strlen($value) > 12) {
            $fail('The :attribute can not be longer than 12 digits.');
        }
        if (strlen($value) < 10) {
            $fail('The :attribute can not be shorter than 10 digits.');
        }
    }
}
