<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"date", "latitude", "langitude", "fuel", "speed", "renter_id", "car_id", "car_status_id"},
 *      schema="CarEventStoreRequest",  
 *      @OA\Property(property="date", type="dateTime",  example="2016-11-08 07:05:41", description="Дата и время события"),
 *      @OA\Property(property="latitude", type="float",  example="35.55242", description="Широта"),
 *      @OA\Property(property="langitude", type="float",  example="23.343332", description="Долгота"),
 *      @OA\Property(property="fuel", type="integer",  example="23", description="Топливо"),
 *      @OA\Property(property="speed", type="integer",  example="44", description="Скорость"),
 *      @OA\Property(property="renter_id", type="integer",  example="3", description="id арендатора"),
 *      @OA\Property(property="car_id", type="integer",  example="3", description="id машины"),
 *      @OA\Property(property="car_status_id", type="integer",  example="3", description="id статуса машины"),
 * )
 */
class CarEventStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date' => 'required|max:20',
            'latitude'=> 'required',
            'langitude'=> 'required',
            'fuel'=> 'required',
            'speed'=> 'required',
            'renter_id'=> 'required',
            'car_id'=> 'required',
            'car_status_id'=> 'required',
        ];
    }
}
