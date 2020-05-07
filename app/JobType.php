<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    /**
     * Codify the types of appointments
     */
    const MAINTENANCE = 'maintenance';
    const REPAIR = 'repair';
    const INSPECTION = 'inspection';

    /**
     * List of the codified types of appointments.
     * For validation purposes.
     * @var array
     */
    static $types = [
        self::MAINTENANCE,
        self::REPAIR,
        self::INSPECTION,
    ];
}
