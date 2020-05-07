<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Customer;

class CustomerEmailIsUnique implements Rule
{
    /**
     * @var Illuminate\Http\Request
     */
    protected $id;

    /**
     * Create a new rule instance.
     * @param int id
     * @return void
     */
    public function __construct(int $id = null)
    {
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $customer = Customer::where('email' ,'=', $value)->first();

        // If no record was found, the email is unique
        if (null === $customer) {
            return true;
        }

        // The email exists but it belongs to the customer being updated 
        if (null !== $this->id && $this->id == $customer->id) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The requested customer email address is already in use.';
    }
}
