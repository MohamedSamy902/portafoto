<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name'              => 'required|string|max:150|min:2',
            'mobile'            => 'required|numeric|digits:11|unique:users,mobile,except,'. $this->id,
            'email'             => 'required|email|unique:users,email,except,'. $this->id,
            'password'          => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'address'           => 'nullable|string',
            'photo'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            'governorate_id'    => 'required|exists:governorates,id',
            'city_id'           => 'required|exists:cities,id',
            'status'            => 'required|in:active,inactive'
        ];
    }
}
