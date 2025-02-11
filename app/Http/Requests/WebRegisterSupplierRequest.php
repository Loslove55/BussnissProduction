<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebRegisterSupplierRequest extends FormRequest
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

            'supplier_name'   => 'required|min:5|max:20|',
            'email'           => 'required|email|unique:users,email',
            'mobile'          => 'required|string|min:9|max:20|unique:users,mobile',
            'hot_number'      => 'required|string|min:4|max:20|unique:users,hot_number',
            "category_ids"    => "required|array|min:1",
            "category_ids.*"  => "required|string|distinct|min:1|exists:categories,id",
            'password'        => 'required|min:6|max:20|confirmed',

            'state_id'        => 'required|exists:states,id',
            'city_id'         => 'required|exists:cities,id',
            "street_nom"      => "required|string",
            'country_id'      => 'required|exists:countries,id',
            "address"         => "required|string",
            // "lat"             => "required|string",
            // "lang"            => "required|string",
            "zip_code"        => "required|string",
        ];
    }
}
