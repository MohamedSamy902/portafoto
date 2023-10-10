<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRquest extends FormRequest
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
            'firstName'         => 'required|string|min:3|max:200',
            'lastName'          => 'required|string|min:3|max:200',
            'email'             => 'nullable|email',
            'address_1'         => 'required|string',
            'address_2'         => 'nullable|string|different:address_1',
            'mobile_1'          => 'required|string|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'mobile_2'          => 'nullable|string|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/|different:mobile_1',
            'governorate_id'    => 'required|exists:governorates,id',
            'city_id'           => 'required|exists:cities,id',
            'zip_code'          => 'nullable|string',
            'payment'           => 'required|in:Cash On Delivery,Vodafone Cash,InstaPay',
        ];
    }
}
