<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class change_pass extends FormRequest
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
            "password1"=>"required|min:8",
            "password2"=>"required|same:password1"
        ];
    }
    public function messages()
    {
        return [

            "required"=>trans("messages.required"),
            "min"=>trans("messages.min"),
            "same"=>trans("messages.same")
        ];
    }
}
