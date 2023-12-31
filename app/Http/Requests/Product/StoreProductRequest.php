<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'              => 'required|string|min:3|max:200',
            'name_ar'           => 'required|string|min:3|max:200',

            'description'       => 'nullable|string|min:3',
            'description_ar'    => 'nullable|string|min:3',


            'price'             => 'nullable|numeric',
            'discount'          => 'nullable|numeric',

            'sizes'             => 'array|required_if:price,null',
            'sizes.*'           => 'required_if:price,null',


            'price_size'        => 'required_if:sizes,not null|array',
            'price_size.*'      => 'required_if:sizes,not null',

            'discount_size'     => 'nullable|array',
            'discount_size.*'   => 'nullable|numeric',
            'category_id'       => 'required|exists:categories,id',


            'photos'            => 'required|array',
            'photos.*'          => 'required|file|image',
            'status'            => 'required|in:active,inactive,SOLD OUT',
            'best'              => 'required|in:no,yes',
            'slider'            => 'required|in:no,yes',


        ];
    }
}
