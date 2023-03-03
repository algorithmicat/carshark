<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'date'=>$this->date,
            'latitude'=>$this->latitude,
            'langitude'=>$this->langitude,
            'fuel'=>$this->fuel,
            'speed'=>$this->speed,
            'renter_id'=>$this->renter_id,
            'car_id'=>$this->car_id,
            'status_id'=>$this->status_id,
        ];
    }
}
