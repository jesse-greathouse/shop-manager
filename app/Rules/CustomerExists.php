<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Customer;

class CustomerExists implements Rule
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
        return (Customer::find($value) === null) ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A customer with the requested id was not found.';
    }
}
