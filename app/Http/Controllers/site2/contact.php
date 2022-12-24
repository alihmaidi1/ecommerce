<?php

namespace App\Http\Controllers\site2;

use App\Http\Controllers\Controller;
use App\Http\Requests\suggest as RequestsSuggest;
use App\Models\suggest;
use Illuminate\Http\Request;

class contact extends Controller
{
    
    public function index(){

        return view("site.contact");
    }

    public function add_contact(RequestsSuggest $request){
        
        try{

            suggest::create([

                "name"=>$request->name,
                "email"=>$request->email,
                "subject"=>$request->subject,
                "content"=>$request->content
            ]);

            return response()->json(["success"=>trans("messages.the suggest was sended")]);



        }catch(\Exception $ex){

            return response()->json(["error"=>trans("messages.we have error")]);


        }

    }


}
