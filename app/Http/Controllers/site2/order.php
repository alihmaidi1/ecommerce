<?php

namespace App\Http\Controllers\site2;

use App\Http\Controllers\Controller;
use App\Models\order as ModelsOrder;
use Illuminate\Http\Request;

class order extends Controller
{
    public function index(){

        return view("site.show_order_user");
    }


    public function show_order_detail($id){

        try{

            $order=ModelsOrder::find($id);
            return view("site.show_order_detail",compact("order"));

        }catch(\Exception){

        return redirect()->route("index")->with(["error"=>trans("messages.we have error")]);

        }


    }
}
