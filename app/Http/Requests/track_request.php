<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class track_request extends FormRequest
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
            
            "name_en"=>"required",
            "name_ar"=>"required",
            "person"=>"required",
            "website"=>"required|url",
            "phone"=>"required|numeric",
            "facebook"=>"required|url",
            "address"=>"required",
            "icon"=>"required|mimes:jpg,jpeg,png,gif",


        ];
    }
    public function messages()
    {
        return [

            "required"=>trans("messages.required"),
            "mimes"=>trans("messages.mimes"),
            "url"=>trans("messages.url"),
            "numeric"=>trans("messages.numeric")
        ];


    }
}
