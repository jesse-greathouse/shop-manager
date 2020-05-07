<?php

namespace App;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'address', 'phone_number', 'email'];

    /**
     * @var string
     */
    protected $first_name;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $phone_number;

    /**
     * @var string
     */
    protected $email;

    /**
     * @return HasMany
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany('App\Vehicle');
    }

}
