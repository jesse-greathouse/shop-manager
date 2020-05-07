<?php

namespace App\Rules;
 
use Illuminate\Http\Request,
    Illuminate\Contracts\Validation\Rule;

use App\Appointment;

class MechanicAvailable implements Rule
{

    /**
     * @var Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var int
     */
    protected $id;

    /**
     * Create a new rule instance.
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function __construct(Request $request, int $id = null)
    {
        $this->request = $request;
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
        $appointments = Appointment::where('mechanic_id' ,'=', $this->request->mechanic_id)
            ->whereBetween('drop_off', [$this->request->drop_off, $this->request->pick_up])
            ->whereBetween('pick_up', [$this->request->drop_off, $this->request->pick_up])
            ->get();

        // If no record was found, there is no conflict
        if ($appointments->count() == 0) return true;

        // The a conflict was detected, but it was for the same appointment
        if (null !== $this->id) {
            foreach($appointments as $appointment) {
                if ($this->id == $appointment->id) return true;
            }
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
        return 'The selected mechanic is not available for the appointment';
    }
}
