<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"number", "mileage", "car_statuses_id", "year_of_release", "car_model_id"},
 *      schema="CarStoreRequest",  
 *      @OA\Property(property="number", type="string",  example="ц135вы", description="Номер машины"),
 *      @OA\Property(property="mileage", type="integer",  example="352", description="Пробег машины"),
 *      @OA\Property(property="car_statuses_id", type="integer",  example="2", description="id статуса машины"),
 *      @OA\Property(property="year_of_release", type="integer",  example="2003", description="Год выпуска машины"),
 *      @OA\Property(property="car_model_id", type="integer",  example="3", description="id модели"),
 * )
 */
class CarStoreRequest extends FormRequest
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
            'number' => 'required|string|max:6|',
            'mileage'=> 'required|integer',
            'car_statuses_id'=> 'required',
            'year_of_release'=> 'required',
            'car_model_id'=> 'required',
        ];
    }
}
