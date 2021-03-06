<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\EmbeddedMechanicSpecialty as MechanicSpecialtyResource;

class EmbeddedMechanic extends JsonResource
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
        ];
    }
}
