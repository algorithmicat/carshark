<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //поставить вместо фолс, тру
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'car_status' => 'required|max:15',
        ];
    }
}
