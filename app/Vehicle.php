<?php

namespace App;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\Relations\BelongsTo,
    Illuminate\Database\Eloquent\Relations\HasMany;

use App\Customer;

class Vehicle extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['make', 'model', 'year', 'notes', 'customer_id'];

    /**
     * @var string
     */
    protected $make;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var integer
     */
    protected $year;

    /**
     * @var string
     */
    protected $notes;

    /**
     * @var BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * @return HasMany
     */
    public function appointments(): HasMany
    {
        return $this->hasMany('App\Appointment');
    }

}
