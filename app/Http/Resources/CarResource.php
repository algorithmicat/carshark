<?php

namespace App\Http\Resources;

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
            'statuses_id' => $this-> statuses_id,
            'model_car_id' => $this-> model_car_id,
            'events' => CarEventResource::collection($this->events), //прописываем ресурс связи с эвентом
        ];
    }
}
