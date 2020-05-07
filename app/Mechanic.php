<?php

namespace App;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\Relations\HasMany;

use App\MechanicSpecialty;

class Mechanic extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name'];

    /**
     * @var string
     */
    protected $first_name;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @return HasMany
     */
    public function specialties(): HasMany
    {
        return $this->hasMany('App\MechanicSpecialty');
    }

    /**
     * @return HasMany
     */
    public function appointments(): HasMany
    {
        return $this->hasMany('App\Appointment');
    }
}
