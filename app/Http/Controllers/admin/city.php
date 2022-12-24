<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\cities;
use Illuminate\Http\Request;

class city extends Controller
{
    //

    public function show_cities(){

        return view("admin.city.show_cities");
    }
    public function add_city(){

        return view("admin.city.add_city");
    }

    public function save_city(Request $request){

        try{

        cities::create([
            "name"=>$request->name,
            "country_id"=>$request->country
        ]);        
        
        return redirect()->route("show_cities")->with(["success"=>trans("messages.the city was created successfully")]);

        }catch(\Exception $ex){
            return redirect()->route("show_cities")->with(["error"=>trans("messages.we have error")]);


        }

    }
    public function delete_city(Request $request){

        try{

            $city=cities::find($request->id);
            $city->delete();

            $citys=cities::paginate(8);
            $pagin="".$citys->links();
            $div="";
            foreach($citys as $user){

                $div.="
                <tr>
                <td><span class='btn btn-warning'>$user->id</span></td>
                <td>$user->name</td>
                <td><span class='btn'>".$user->country->name."</span></td>
                <td>$user->created_at</td>
                <td>$user->updated_at</td>
                <td>
                  <a href=".url("admin/edit_city/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                  <a onclick='delete_city($user->id)'  class='btn btn-danger'><i class='fa fa-trash'></i></a>
                </td>
            </tr>
                ";
            }
            return response()->json(["success"=>trans("messages.the city was deleted"),"pagin"=>$pagin,"div"=>$div]);
        }catch(\Exception ){            
            return response()->json(["error"=>trans("messages.we Have An Error")]);
        }
    }

    public function edit_city($id){

        $city=cities::find($id);
        return view("admin.city.edit_city",compact("city"));
    }
    public function save_city1(Request $request){
        try{

            $city=cities::find($request->id);
            $city->update([

                "name"=>$request->name,
                "country_id"=>$request->country
            ]);

            return redirect()->route("show_cities")->with(["success"=>trans("messages.the city was updated")]);
        }catch(\Exception){
            return redirect()->route("show_cities")->with(["error"=>trans("messages.we have An Error")]);


        }


    }
}

