<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class setting extends FormRequest
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
            "Email"=>"required|email",
            "logo"=>"mimes:jpg,jpeg,png,gif",
            "description"=>"required",
            "keyword"=>"required",
            "status"=>"required|in:open,close",
            "phone"=>"required",
            "address"=>"required",
            "time_work"=>"required",
            "facebook"=>"required|url"
        ];
    }

    public function messages()
    {
        return [

            "required"=>trans("messages.required"),
            "email"=>trans("messages.email"),
            "mimes"=>trans("messages.mimes"),
            "in"=>trans("messages.in"),
            "url"=>trans("messages.url"),
            

        ];
    }
}
