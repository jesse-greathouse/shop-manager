<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\EmbeddedMechanic as MechanicResource;

class MechanicSpecialty extends JsonResource
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
            'id'        => $this->id,
            'job_type'  => $this->job_type,
            'mechanic'  => MechanicResource::make($this->mechanic),
        ];
    }
}
