<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\JobType;

class IsJobType implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, JobType::$types);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The input is not a valid job type. It must be one of: '. implode(', ', JobType::$types) .' .';
    }
}
