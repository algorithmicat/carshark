<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"name", "car_mark_id"},
 *      schema="CarModelStoreRequest",  
 *      @OA\Property(property="name", type="string",  example="rio", description="Модель машины"),
 *      @OA\Property(property="car_mark_id", type="integer",  example="3", description="Марка машины"),
 * )
 */
class CarModelStoreRequest extends FormRequest 
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
            'name' => 'required|max:20',
            'car_mark_id'=>'required',
        ];
    }
}
