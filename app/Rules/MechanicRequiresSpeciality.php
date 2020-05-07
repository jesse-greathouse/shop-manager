<?php

namespace App\Rules;

use Illuminate\Http\Request,
    Illuminate\Contracts\Validation\Rule;

use App\MechanicSpecialty;

class MechanicRequiresSpeciality implements Rule
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
        $specialities = MechanicSpecialty::where('mechanic_id' ,'=', $this->request->mechanic_id)
            ->get();

        foreach ($specialities as $specialty) {
            if ($specialty->job_type == $this->request->job_type) {
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
        return 'The mechanic already has the specialty: '. $this->request->job_type .'.';
    }
}
