<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class product_request extends FormRequest
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

            "title_ar"=>"required",
            "title_en"=>"required",
            "content_ar"=>"required|min:75",
            "content_en"=>"required|min:75",
            "department"=>"required|exists:categories,id",
            "photo"=>"required",
            "price"=>"required|numeric",
            "numbers"=>"required|integer",
            "price_offer"=>"numeric|lt:price",
            "end_offer_at"=>"date",
            "start_offer_at"=>"date|before:end_offer_at",
            "status"=>"required|in:active,waiting,ending",
            "size_id"=>"required",
            "tax"=>"required|numeric",
            "shipping"=>"required|numeric",
            "color_id"=>"required",
            "weight"=>"required|integer",
            "factory_id"=>"required|exists:factories,id"
        ];
    }

    public function messages()
    {
      return [
        "required"=>trans("messages.required"),
        "integer"=>trans("messages.integer"),
        "mimes"=>trans("messages.mimes"),
        "in"=>trans("messages.in"),
        "date"=>trans("messages.date"),
        "numeric"=>trans("messages.numeric"),
        "min"=>trans("messages.min"),
        "exists"=>trans("messages.exists"),
        "lt"=>trans("messages.lt"),
      ];

    }
}
