<?php

namespace App;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Mechanic,
    App\Vehicle;

class Appointment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['drop_off', 'pick_up', 'mechanic_id', 'appointment_job_type', 'vehicle_id'];

    /**
     * @var \DateTime
     */
    protected $drop_off;

    /**
     * @var \DateTime
     */
    protected $pick_up;

    /**
     * @var String
     */
    protected $appointment_job_type;

    /**
     * @return BelongsTo
     */
    public function mechanic(): BelongsTo
    {
        return $this->belongsTo('App\Mechanic');
    }

    /**
     * @return BelongsTo
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo('App\Vehicle');
    }

    
}
