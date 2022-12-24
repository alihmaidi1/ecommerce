<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class register_user extends FormRequest
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
            
            "name"=>"required|min:8",
            "email"=>"required|email",
            "password"=>"required|min:8",
            "confirm_password"=>"required|same:password"
        ];
    }

    public function messages()
    {
        return [
            "required"=>trans("messages.required"),
            "min"=>trans("messages.min"),
            "same"=>trans("messages.same"),
            "email"=>trans("messages.email"),
        ];
    }
}
