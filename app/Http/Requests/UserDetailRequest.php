<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'phone'    => 'required',
            'state_id' => 'required',
            'city_id'  => 'required|string',
            'zone_id'  => 'required|string',
            'zip_code' => 'required|string',
            'street'   => 'required|string',
            'address'  => 'required|string',
            //'bank_reference' => 'required',
            //'name_bank' => 'required',
        ];
    }
}
