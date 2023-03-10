<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarStatusResource extends JsonResource
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
            'id' => $this->id,
            'car_status' => $this->car_status,
            //'events' => $this->events, // прописываем ВС с списком событий
            'events' => CarEventResource::collection($this->events), //ураа, получилось спустя чааас, юху живём-живём. Используем ресурс эвента
        ];
    }
}
