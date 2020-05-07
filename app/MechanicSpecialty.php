<?php

namespace App;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Mechanic;

class MechanicSpecialty extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['job_type', 'mechanic_id'];

    /**
     * @var string
     */
    protected $job_type;

    /**
     * @return BelongsTo
     */
    public function mechanic(): BelongsTo
    {
        return $this->belongsTo('App\Mechanic');
    }
}
