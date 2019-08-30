<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'payment_type' => 'required|in:mercadopago,vendedor',
            'state_id'     => 'required|integer',
            'city_id'      => 'required|integer',
            'zone_id'      => 'required|integer',
            'zip_code'     => 'required|string',
            'street'       => 'required|string',
            'address'      => 'required|string',
        ];
    }
}
