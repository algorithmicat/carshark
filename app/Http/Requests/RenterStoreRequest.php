<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenterStoreRequest extends FormRequest
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
            'name' => 'required',
            'patronymic'=>'required',
            'surname'=>'required',
            'age'=>'required',
            'address'=>'required',
            'passport_number'=>'required',
            'passport_series'=>'required',
            'latitude'=>'required',
            'langitude'=>'required',
            'balance'=>'required',
            'user_statuses_id'=>'required',
        ];
    }
}
