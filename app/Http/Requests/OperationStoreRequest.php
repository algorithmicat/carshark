<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"date", "sum", "renter_id"},
 *      schema="OperationStoreRequest",  
 *      @OA\Property(property="date", type="date", example="2019-12-19", description="Дата"),
 *      @OA\Property(property="sum", type="float", example="352.0", description="Сумма"),
 *      @OA\Property(property="renter_id", type="integer",  example="2", description="id статуса арендатора"),
 * )
 */
class OperationStoreRequest extends FormRequest
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
            'date' => 'required',
            'sum'=>'required',
            'renter_id'=>'required',
        ];
    }
}
