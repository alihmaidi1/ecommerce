<?php

namespace App\Http\Controllers\site2;

use App\Http\Controllers\Controller;
use App\Http\Requests\new_letter;
use App\Models\newsletter as ModelsNewsletter;
use Illuminate\Http\Request;

class newsletter extends Controller
{
    //

    public function create(new_letter $request){


        try{

            ModelsNewsletter::create([

                "email"=>$request->email
            ]);

            return response()->json(["success"=>trans("messages.the Subscribe done successfully")]);
            
        }catch(\Exception){
            return response()->json(["error"=>trans("messages.we have error")]);

        }


    }
}
