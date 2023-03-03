<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'status_id'=> 'required',
        ];
    }
}
