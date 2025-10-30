<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class XmlValidation implements Rule
{
    public function passes($attribute, $value)
    {
        return simplexml_load_string($value) !== false;
    }

    public function message()
    {
        return 'The :attribute must be a valid XML.';
    }
}
