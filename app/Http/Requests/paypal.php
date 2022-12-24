<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Http\Middleware\TrimStrings;

class paypal extends FormRequest
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
            //
            "name"=>"required",
            "email"=>"required|email",
            "phone"=>"required|numeric",
            "city"=>"required",
            "address"=>"required",
            "zipcode"=>"required",
        ];
    }

    public function messages()
    {
        return [

            "required"=>trans("messages.required"),
            "email"=>trans("messages.email"),
            "numeric"=>trans("messages.numeric"),
            


        ];
    } 
}
