<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RenterResource extends JsonResource
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
            'name'=>$this->name,
            'patronymic'=>$this->patronymic,
            'surname'=>$this->surname,
            'age'=>$this->age,
            'address'=>$this->address,
            'passport_number'=>$this->passport_number,
            'passport_series'=>$this->passport_series,
            'latitude'=>$this->latitude,
            'langitude'=>$this->langitude,
            'balance'=>$this->balance,
            'user_statuses_id'=>$this->user_statuses_id,
        ];
    }
}
