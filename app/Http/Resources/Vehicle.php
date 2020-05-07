<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\EmbeddedCustomer as CustomerResource,
    App\Http\Resources\EmbeddedAppointment as AppointmentResource;

class Vehicle extends JsonResource
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
            'make'          => $this->make,
            'model'         => $this->model,
            'year'          => $this->year,
            'notes'         => $this->notes,
            'customer'      => CustomerResource::make($this->customer),
            'appointments'  => AppointmentResource::collection($this->appointments),
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
