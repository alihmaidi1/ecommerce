<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class factory_request extends FormRequest
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

            "name_ar"=>"required",
            "name_en"=>"required",
            "person"=>"required",
            "mobile"=>"required|numeric",
            "email"=>"required|email",
            "facebook"=>"required|url",
            "address"=>"required",
            "icon"=>"required|mimes:jpg,png,gif,jpeg"
        ];
    }

    public function messages()
    {
        
        return [

            "required"=>trans("messages.required"),
            "email"=>trans("messages.email"),
            "url"=>trans("messages.url"),
            "mimes"=>trans("messages.mimes"),
            "numeric"=>trans("messages.numeric")
        ];
    }
}
