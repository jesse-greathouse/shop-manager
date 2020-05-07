<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\EmbeddedVehicle as VehicleResource,
    App\Http\Resources\EmbeddedMechanic as MechanicResource;

class EmbeddedAppointment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'                    => $this->id,
            'drop_off'              => $this->drop_off,
            'pick_up'               => $this->pick_up,
            'appointment_job_type'  => $this->appointment_job_type,
            'vehicle'               => VehicleResource::make($this->vehicle),
            'mechanic'              => MechanicResource::make($this->mechanic),
        ];
    }
}
