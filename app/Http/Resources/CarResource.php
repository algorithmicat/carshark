<?php

namespace App\Http\Resources;

use App\Models\CarEvent;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'number' => $this-> number,
            'car_statuses_id' => $this-> car_statuses_id,
            'car_model_id' => $this-> car_model_id,
            'car_events' => CarEventResource::collection(CarEvent::all()), //прописываем ресурс связи с эвентом
            // 'car_events' => new CarEventResource($this->resource->createdBy),
            // 'car_events' => $this->car_events,
        ];
    }
}
