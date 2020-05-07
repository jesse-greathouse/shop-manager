<?php

namespace App\Rules;

use Illuminate\Http\Request,
    Illuminate\Contracts\Validation\Rule;

use App\Mechanic;

class MechanicEligible implements Rule
{
    /**
     * @var Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new rule instance.
     * @param Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
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
        $mechanic = $mechanic = Mechanic::find($value);

        foreach ($mechanic->specialities as $specialty) {
            if ($specialty->job_type == $this->request->appointment_job_type) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
