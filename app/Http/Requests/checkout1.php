<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkout1 extends FormRequest
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

            "first_name"=>"required",
            "last_name"=>"required",
            "track"=>"required",
            "country"=>"required",
            "address"=>"required",
            "city"=>"required",
            "state"=>"required",
            "zip"=>"required" ,
            "accept"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
                       

            
        ];
    }

    public function messages()
    {
        return [

            "required"=>trans("messages.required"),
            "email"=>trans("messages.email")


        ];
    }
}
