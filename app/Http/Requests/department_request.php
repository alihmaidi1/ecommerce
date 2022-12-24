<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class department_request extends FormRequest
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

            "name_en"=>"required|max:50",
            "name_ar"=>"required|max:50",
            "description"=>"required",
            "keyword"=>"required",
            "icon"=>"required|mimes:jpg,png,gif,jpeg",
        ];
    }
    public function messages()
    {
        
    return [

        "required"=>trans("messages.required"),
        "max"=>trans("messages.max"),
        "mimes"=>trans("messages.mimes")


    ];        


    }
}
