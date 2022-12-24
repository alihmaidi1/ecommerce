<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class edit_user extends FormRequest
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
            
            "name"=>"required",
            "password"=>"required|min:8",
            "confirm_password"=>"required|same:password"

        ];
    }
    public function messages()
    {
        return [

            "required"=>trans("messages.required"),
            "in"=>trans("messages.in"),
            "same"=>trans("messages.same"),
            "min"=>trans("messages.min"),

        ];
    }
}
