<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\EmbeddedAppointment as AppointmentResource,
    App\Http\Resources\EmbeddedMechanicSpecialty as MechanicSpecialtyResource;

class Mechanic extends JsonResource
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
            'id'            => $this->id,
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'specialties'   => MechanicSpecialtyResource::collection($this->specialties),
            'appointments'  => AppointmentResource::collection($this->appointments),
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
